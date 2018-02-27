<?php

namespace App\Twig;

use Money\Money;

/**
 * Simple MoneyFormatExtension
 *
 * @author  Wojciech Andruszkiewicz
 * @package App\Twig
 */
class MoneyFormatExtension extends \Twig_Extension
{
    /**
     * configure filter
     *
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'money_format',
                array($this, 'moneyFormatFilter', array('needs_context' => true, 'needs_environment' => true))
            )
        );
    }

    /**
     * Return formatted money
     *
     * @param  Money $money
     * @return string
     */
    public function moneyFormatFilter(Money $money)
    {
        // return money as string
        return $money->getAmount().' '.$money->getCurrency()->getCode();
    }
}
