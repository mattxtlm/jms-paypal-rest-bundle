<?php
namespace Wanawork\JMS\PaypalRestBundle\Plugin;

use JMS\Payment\CoreBundle\Model\FinancialTransactionInterface;
use JMS\Payment\CoreBundle\Model\PaymentInstructionInterface;
use JMS\Payment\CoreBundle\Plugin\GatewayPlugin;
/*
 * Copyright 2013 Ilya Biryukov <ilya@wannawork.ie>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class PaypalRestPlugin extends GatewayPlugin
{
    
    public function __constuct($isDebug)
    {
        parent::__construct($isDebug);
        
    }
    
    /**
     * This method executes an approve transaction.
     *
     * By an approval, funds are reserved but no actual money is transferred. A
     * subsequent deposit transaction must be performed to actually transfer the
     * money.
     *
     * A typical use case, would be Credit Card payments where funds are first
     * authorized.
     *
     * @param FinancialTransactionInterface $transaction
     * @param boolean $retry Whether this is a retry transaction
     * @return void
     */
    function approve(FinancialTransactionInterface $transaction, $retry)
    {
        
    }
    
    /**
     * This method executes a deposit transaction without prior approval
     * (aka "sale", or "authorization with capture" transaction).
     *
     * A typical use case for this method is an electronic check payments
     * where authorization is not supported. It can also be used to deposit
     * money in only one transaction, and thus saving processing fees for
     * another transaction.
     *
     * @param FinancialTransactionInterface $transaction
     * @param boolean $retry
     * @return void
    */
    function approveAndDeposit(FinancialTransactionInterface $transaction, $retry)
    {
        
    }
    
    /**
     * This method checks whether all required parameters exist in the given
     * PaymentInstruction, and whether they are syntactically correct.
     *
     * This method is meant to perform a fast parameter validation; no connection
     * to any payment back-end system should be made at this stage.
     *
     * In case, this method is not implemented. The PaymentInstruction will
     * be considered to be valid.
     *
     * @param PaymentInstructionInterface $paymentInstruction
     * @throws JMS\Payment\CoreBundle\Plugin\Exception\InvalidPaymentInstructionException if the the PaymentInstruction is not valid
     * @return void
    */
    function checkPaymentInstruction(PaymentInstructionInterface $paymentInstruction)
    {
        
    }
    
    /**
     * This method executes a credit transaction (aka refund transaction).
     *
     * This method is called for dependent (has prior deposit), and independent
     * credits. The associated payment can be retrieved via the Credit object
     * associated with the transaction.
     *
     * @param FinancialTransactionInterface $transaction
     * @param boolean $retry
     * @return void
    */
    function credit(FinancialTransactionInterface $transaction, $retry)
    {
        
    }
    
    /**
     * This method executes a deposit transaction (aka capture transaction).
     *
     * This method requires that the Payment has already been approved in
     * a prior transaction.
     *
     * A typical use case are Credit Card payments.
     *
     * @param FinancialTransactionInterface $transaction
     * @param boolean $retry
     * @return void
    */
    function deposit(FinancialTransactionInterface $transaction, $retry)
    {
        
    }
    
    /**
     * This method cancels a previously approved payment.
     *
     * @throws InvalidDataException if a partial amount is passed, but this is
     *                              not supported by the payment backend system
     * @param FinancialTransactionInterface $transaction
     * @param boolean $retry
     * @return void
    */
    function reverseApproval(FinancialTransactionInterface $transaction, $retry)
    {
        
    }
    
    /**
     * This method cancels a previously issued Credit.
     *
     * @throws InvalidDataException if a partial amount is passed, but this is
     *                              not supported by the payment backend system
     * @param FinancialTransactionInterface $transaction
     * @param boolean $retry
     * @return void
    */
    function reverseCredit(FinancialTransactionInterface $transaction, $retry)
    {
        
    }
    
    /**
     * This method cancels a previously deposited amount.
     *
     * @throws InvalidDataException if a partial amount is passed, but this is
     *                              not supported by the payment backend system
     * @param FinancialTransactionInterface $transaction
     * @param boolean $retry
     * @return void
    */
    function reverseDeposit(FinancialTransactionInterface $transaction, $retry);
    
    /**
     * This method validates the correctness, and existence of any account
     * associated with the PaymentInstruction object.
     *
     * This method performs a more thorough validation than checkPaymentInstruction,
     * in that it may actually connect to the payment backend system; no funds should
     * be transferred, though.
     *
     * @throws JMS\Payment\CoreBundle\Plugin\Exception\InvalidPaymentInstructionException if the PaymentInstruction is not valid
     * @param PaymentInstructionInterface $paymentInstruction
     * @return void
    */
    function validatePaymentInstruction(PaymentInstructionInterface $paymentInstruction);
    
    /**
     * Whether this plugin can process payments for the given payment system.
     *
     * A plugin may support multiple payment systems. In these cases, the requested
     * payment system for a specific transaction  can be determined by looking at
     * the PaymentInstruction which will always be accessible either directly, or
     * indirectly.
     *
     * @param string $paymentSystemName
     * @return boolean
    */
    function processes($paymentSystemName);
    
    /**
     * Whether independent credit is supported by this plugin.
     *
     * Dependent Credit: The Credit depends on the existence of a Payment, and
     * the Credit's amount must not be greater than the deposited amount of the
     * related Payment.
     *
     * Independent Credit: The Credit does not depend on a Payment, but can be
     * awarded "independently" to a PaymentInstruction. The amount is not restricted
     * by any deposited amount.
     *
     * @return boolean
    */
    function isIndependentCreditSupported();
}