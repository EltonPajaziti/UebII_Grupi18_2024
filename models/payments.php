<?php

class Invoice {
    private $patient;
    private $services;
    private $totalAmount;
    private $paidAmount;
    private $dueAmount;

    public function __construct($patient, $services, $totalAmount, $paidAmount = 0) {
        $this->patient = $patient;
        $this->services = $services;
        $this->totalAmount = $totalAmount;
        $this->paidAmount = $paidAmount;
        $this->dueAmount = $totalAmount - $paidAmount;
    }

    public function getPatient() {
        return $this->patient;
    }

    public function getServices() {
        return $this->services;
    }

    public function getTotalAmount() {
        return $this->totalAmount;
    }

    public function getPaidAmount() {
        return $this->paidAmount;
    }

    public function getDueAmount() {
        return $this->dueAmount;
    }

   
}

class Payment {
    private $amount;
    private $paymentDate;
    private $paymentMethod;

    public function __construct($amount, $paymentDate, $paymentMethod) {
        $this->amount = $amount;
        $this->paymentDate = $paymentDate;
        $this->paymentMethod = $paymentMethod;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getPaymentDate() {
        return $this->paymentDate;
    }

    public function getPaymentMethod() {
        return $this->paymentMethod;
    }
}

class BillingManager {
    private $invoices;
    private $payments;

    public function __construct() {
        $this->invoices = [];
        $this->payments = [];
    }

    public function generateInvoice($patient, $services, $totalAmount) {
        $invoice = new Invoice($patient, $services, $totalAmount);
        $this->invoices[] = $invoice;
        return $invoice;
    }

    public function recordPayment($invoice, $amount, $paymentDate, $paymentMethod) {
        $payment = new Payment($amount, $paymentDate, $paymentMethod);
        $invoice->paidAmount += $amount;
        $invoice->dueAmount -= $amount;
        $this->payments[] = $payment;
        return $payment;
    }
}

?>