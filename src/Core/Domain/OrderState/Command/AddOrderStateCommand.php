<?php
/**
 * 2007-2020 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
declare(strict_types=1);

namespace PrestaShop\PrestaShop\Core\Domain\OrderState\Command;

use PrestaShop\PrestaShop\Core\Domain\OrderState\Exception\OrderStateConstraintException;

/**
 * Adds new order state with provided data
 */
class AddOrderStateCommand
{
    /**
     * @var string[]
     */
    private $localizedNames;
    /**
     * @var string
     */
    private $color;
    /**
     * @var bool
     */
    private $loggable;
    /**
     * @var bool
     */
    private $invoice;
    /**
     * @var bool
     */
    private $hidden;
    /**
     * @var bool
     */
    private $sendEmail;
    /**
     * @var bool
     */
    private $pdfInvoice;
    /**
     * @var bool
     */
    private $pdfDelivery;
    /**
     * @var bool
     */
    private $shipped;
    /**
     * @var bool
     */
    private $paid;
    /**
     * @var bool
     */
    private $delivery;
    /**
     * @var array
     */
    private $localizedTemplates;

    /**
     * @param string[] $localizedNames
     * @param string[] $localizedTemplates
     */
    public function __construct(
        array $localizedNames,
        string $color,
        bool $loggable,
        bool $invoice,
        bool $hidden,
        bool $sendEmail,
        bool $pdfInvoice,
        bool $pdfDelivery,
        bool $shipped,
        bool $paid,
        bool $delivery,
        array $localizedTemplates
    ) {
        $this->setLocalizedNames($localizedNames);
        $this->color = $color;
        $this->loggable = $loggable;
        $this->invoice = $invoice;
        $this->hidden = $hidden;
        $this->sendEmail = $sendEmail;
        $this->pdfInvoice = $pdfInvoice;
        $this->pdfDelivery = $pdfDelivery;
        $this->shipped = $shipped;
        $this->paid = $paid;
        $this->delivery = $delivery;
        $this->localizedTemplates = $localizedTemplates;
    }

    /**
     * @return string[]
     */
    public function getLocalizedNames()
    {
        return $this->localizedNames;
    }

    /**
     * @param string[] $localizedNames
     *
     * @return $this
     *
     * @throws OrderStateConstraintException
     */
    public function setLocalizedNames(array $localizedNames)
    {
        if (empty($localizedNames)) {
            throw new OrderStateConstraintException('Order status name cannot be empty', OrderStateConstraintException::EMPTY_NAME);
        }

        $this->localizedNames = $localizedNames;

        return $this;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return bool
     */
    public function isLoggable()
    {
        return $this->loggable;
    }

    /**
     * @return bool
     */
    public function isInvoice()
    {
        return $this->invoice;
    }

    /**
     * @return bool
     */
    public function isHidden()
    {
        return $this->hidden;
    }

    /**
     * @return bool
     */
    public function isSendEmail()
    {
        return $this->sendEmail;
    }

    /**
     * @return bool
     */
    public function isPdfInvoice()
    {
        return $this->pdfInvoice;
    }

    /**
     * @return bool
     */
    public function isPdfDelivery()
    {
        return $this->pdfDelivery;
    }

    /**
     * @return bool
     */
    public function isShipped()
    {
        return $this->shipped;
    }

    /**
     * @return bool
     */
    public function isPaid()
    {
        return $this->paid;
    }

    /**
     * @return bool
     */
    public function isDelivery()
    {
        return $this->delivery;
    }

    /**
     * @return string[]
     */
    public function getLocalizedTemplates()
    {
        return $this->localizedTemplates;
    }
}
