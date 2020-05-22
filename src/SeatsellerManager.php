<?php


namespace Carabostudio\Seatseller;


use Carabostudio\Seatseller\Exceptions\ConfigurationException;
use Carabostudio\Seatseller\Models\BlockTicket;
use Carabostudio\Seatseller\Models\CancelRequest;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Illuminate\Http\JsonResponse;


/**
 * Class SeatsellerManager
 * @package Carabostudio\Seatseller
 */
class SeatsellerManager
{

    /**
     * @var GuzzleClient
     */
    private GuzzleClient $client;

    /**
     * SeatsellerManager constructor.
     *
     * setting up guzzle client for seatseller
     *
     * @throws ConfigurationException
     */
    public function __construct()
    {

        $env = config('seatseller.environment');
        $credentials = config('seatseller.credentials.' . $env);

        if (!$credentials['consumer_key'] || !$credentials['consumer_secret']) {
            throw new ConfigurationException('Credentials are required to create a Client');
        }

        $consumer_key = $credentials['consumer_key'];
        $consumer_secret = $credentials['consumer_secret'];

        $handler = new CurlHandler();
        $stack = HandlerStack::create($handler);

        $middleware = new Oauth1([
            'consumer_key' => $consumer_key,
            'consumer_secret' => $consumer_secret,
            'token_secret' => '',
            'token' => '',
            'request_method' => Oauth1::REQUEST_METHOD_HEADER,
            'signature_method' => Oauth1::SIGNATURE_METHOD_HMAC
        ]);
        $stack->push($middleware);

        $this->client = new Client([
            'handler' => $stack
        ]);

    }

    /**
     * SeatsellerManager Cities
     *
     * @return JsonResponse
     */
    public function cities()
    {
        try {

            $sourcesResponse = $this->client->get($this->url('cities'), [
                'auth' => 'oauth'
            ]);

            return $this->response(json_decode($sourcesResponse->getBody()));

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * SeatsellerManager Sources Cities
     *
     * @return JsonResponse
     */
    public function sources()
    {
        try {

            $sourcesResponse = $this->client->get($this->url('sources'), [
                'auth' => 'oauth'
            ]);

            return $this->response(json_decode($sourcesResponse->getBody()));

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * SeatsellerManager Destinations Cities By Source
     *
     * @param string $source
     * @return JsonResponse
     */
    public function destinations(string $source)
    {
        try {

            $queryParams = [
                'source' => $source
            ];

            $sourcesResponse = $this->client->get($this->url('destinations', $queryParams), [
                'auth' => 'oauth'
            ]);

            return $this->response(json_decode($sourcesResponse->getBody()));

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * @param string $source
     * @param string $destination
     * @param string $dateOfJourney
     * @return JsonResponse
     * @throws Exception
     */
    public function searchTrips(string $source, string $destination, string $dateOfJourney)
    {
        try {

            $queryParams = [
                'source' => $source,
                'destination' => $destination,
                'doj' => Carbon::parse($dateOfJourney)->format('Y-m-d'),
            ];

            $sourcesResponse = $this->client->get($this->url('availabletrips', $queryParams), [
                'auth' => 'oauth'
            ]);

            return $this->response(json_decode($sourcesResponse->getBody()));

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        } catch (Exception $exception) {

            return $this->response($exception->getMessage(), $exception->getCode(), false);

        }
    }

    /**
     * SeatsellerManager Boarding Point Detail
     *
     * @param string $boardingPointId
     * @param string $tripId
     * @return JsonResponse
     */
    public function boardingPoints(string $boardingPointId, string $tripId)
    {
        try {

            $queryParams = [
                'id' => $boardingPointId,
                'tripId' => $tripId
            ];

            $sourcesResponse = $this->client->get($this->url('boardingPoint', $queryParams), [
                'auth' => 'oauth'
            ]);

            return $this->response(json_decode($sourcesResponse->getBody()));

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * SeatsellerManager Trip Detail / Seats Detail
     *
     * @param string $tripId
     * @return JsonResponse
     */
    public function seats(string $tripId)
    {
        try {

            $queryParams = [
                'id' => $tripId
            ];

            $sourcesResponse = $this->client->get($this->url('tripdetails', $queryParams), [
                'auth' => 'oauth'
            ]);

            return $this->response(json_decode($sourcesResponse->getBody()));

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * Block Ticket
     *
     * @param BlockTicket $blockTicket
     * @return JsonResponse
     */
    public function blockTicket(BlockTicket $blockTicket)
    {
        try {

            $sourcesResponse = $this->client->post($this->url('blockTicket'), [
                'auth' => 'oauth',
                'json' => $blockTicket
            ]);

            return $this->response($sourcesResponse->getBody()->getContents());

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * Ticket Fare Breakup
     *
     * @param string $blockKey
     * @return JsonResponse
     */
    public function fareBreakup(string $blockKey)
    {
        try {

            $queryParams = [
                'blockKey' => $blockKey
            ];

            $sourcesResponse = $this->client->get($this->url('rtcfarebreakup', $queryParams), [
                'auth' => 'oauth'
            ]);

            return $this->response(json_decode($sourcesResponse->getBody()->getContents()));

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * Book Ticket
     *
     * @param string $blockKey
     * @return JsonResponse
     */
    public function bookTicket(string $blockKey)
    {
        try {

            $queryParams = [
                'blockKey' => $blockKey
            ];

            $sourcesResponse = $this->client->post($this->url('bookticket', $queryParams), [
                'auth' => 'oauth'
            ]);

            return $this->response($sourcesResponse->getBody()->getContents());

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * Check Booked Ticket
     *
     * @param string $blockKey
     * @return JsonResponse
     */
    public function checkTicket(string $blockKey)
    {
        try {

            $queryParams = [
                'blockKey' => $blockKey
            ];

            $sourcesResponse = $this->client->get($this->url('checkBookedTicket', $queryParams), [
                'auth' => 'oauth'
            ]);

            return $this->response(json_decode($sourcesResponse->getBody()->getContents()));

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * Print Ticket / Ticket Information
     *
     * @param string $tin
     * @return JsonResponse
     */
    public function printTicket(string $tin)
    {
        try {

            $queryParams = [
                'tin' => $tin
            ];

            $sourcesResponse = $this->client->get($this->url('ticket', $queryParams), [
                'auth' => 'oauth'
            ]);

            return $this->response(json_decode($sourcesResponse->getBody()->getContents()));

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * Ticket Cancellation Data
     *
     * @param string $tin
     * @return JsonResponse
     */
    public function cancellationData(string $tin)
    {
        try {

            $queryParams = [
                'tin' => $tin
            ];

            $sourcesResponse = $this->client->get($this->url('cancellationdata', $queryParams), [
                'auth' => 'oauth'
            ]);

            return $this->response(json_decode($sourcesResponse->getBody()->getContents()));

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * Cancel Ticket
     *
     * @param CancelRequest $data
     * @return JsonResponse
     */
    public function cancelTicket(CancelRequest $data)
    {
        try {

            // todo add with custom classes

            $sourcesResponse = $this->client->post($this->url('cancelticket'), [
                'auth' => 'oauth',
                'json' => $data
            ]);

            return $this->response($sourcesResponse->getBody()->getContents());

        } catch (GuzzleException $guzzleException) {

            return $this->response($guzzleException->getMessage(), $guzzleException->getCode(), false);

        }
    }

    /**
     * Getting SeatsellerManager Url
     *
     * @param string $uri
     * @param array|null $query
     * @return string
     */
    public function url(string $uri, array $query = null)
    {
        return 'http://api.seatseller.travel/' . $uri . '?' . http_build_query($query ? $query : array());
    }

    /**
     * Response generator
     *
     * @param $data
     * @param int $code
     * @param bool $status
     * @return JsonResponse
     */
    public function response($data, int $code = JsonResponse::HTTP_OK, bool $status = true)
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'data' => $data
        ]);
    }

}
