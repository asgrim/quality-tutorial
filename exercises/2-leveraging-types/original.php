<?php
declare(strict_types=1);

namespace Exercises;

use Assert\Assert;

interface HttpClient
{
    public function request(string $url, string $method, string $body) : int;
    public function getLastResponse(): string;
}

class PaymentDetails
{
    private $tid;
    private $amt;
    private $isPaid;
    public function getTid()
    {
        return $this->tid;
    }
    public function setTid($tid)
    {
        $this->tid = $tid;
    }
    public function getAmt()
    {
        return $this->amt;
    }
    public function setAmt($amt)
    {
        $this->amt = $amt;
    }
    public function getisPaid()
    {
        return $this->isPaid;
    }
    public function setIsPaid($isPaid)
    {
        $this->isPaid = $isPaid;
    }
}

class MyFunPaymentGateway
{
    /** @var HttpClient */
    private $http;

    /** @var string[] */
    private $responses;

    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    /**
     * {@inheritDoc}
     * @throws \Exception
     */
    public function preauthorise(PaymentDetails $paymentDetails)
    {
        $setupResult = $this->http->request('/setup-transaction', 'POST', json_encode([
            'tid' => $paymentDetails->getTid(),
            'amt' => (float)$paymentDetails->getAmt(),
        ]));
        $this->responses[] = json_decode($this->http->getLastResponse(), true);
        if ($setupResult === 200) {
            $preauthResult = $this->http->request('/preauthorise', 'POST', $paymentDetails->getTid());
            $responses[] = json_decode($this->http->getLastResponse(), true);
            if ($preauthResult === 200) {
                $paymentDetails->setIsPaid(true);
                return true;
            } else {
                throw new \Exception('Unable to do things');
            }
        } else {
            return false;
        }
    }

    public function getBookingId()
    {
        foreach ($this->responses as $response) {
            if (isset($response['booking_id'])) {
                return $response['booking_id'];
            }
        }
    }

    public function completePayment(string $pmt)
    {
        // TODO: Implement completePayment() method.
    }
}
