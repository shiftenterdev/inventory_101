<?php

namespace App\Repo;

use App\Models\Customer;
use App\Models\Image;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sell;

trait CoreTrait
{
    public static function customerId()
    {
        $customer_id = Customer::orderBy('id', 'desc')->pluck('customer_no');
        if (empty($customer_id)) {
            $customer_id = 1000001;
        } else {
            $customer_id = $customer_id + 1;
        }

        return $customer_id;
    }

    public static function imageById($id)
    {
        $name = Image::where('id', $id)->pluck('img_title');

        return $name;
    }

    public static function catById($id)
    {
        $cat_name = Category::where('id', $id)->pluck('cat_title');

        return $cat_name;
    }

    public static function productCode()
    {
        $product_code = Product::orderBy('id', 'desc')->pluck('code');
        if (empty($product_code)) {
            $product_code = 'P1000001';
        } else {
            $product_code = str_replace('P', '', $product_code);
            $product_code = 'P'.(intval($product_code) + 1);
        }

        return $product_code;
    }

    public static function productTitleByCode($id)
    {
        $title = Product::where('code', $id)->pluck('title');

        return $title;
    }

    public static function productPriceByCode($id)
    {
        $price = Product::where('code', $id)->pluck('price');

        return $price;
    }

    public static function SellInvoiceId()
    {
        $invoice = Invoice::where('status', 0)
            ->orderBy('id', 'desc')->where('type', 'sell')->select('invoice_no')->first();
        if (empty($invoice)) {
            $invoice = Invoice::orderBy('id', 'desc')->where('type', 'sell')
                ->select('invoice_no')->first();
            if (empty($new)) {
                return 600000;
            }
            return $invoice->invoice_no + 1;
        } else {
            return $invoice->invoice_no;
        }
    }

    public static function PurchaseInvoiceId()
    {
        $invoice = Invoice::where('status', 0)
            ->orderBy('id', 'desc')->where('type', 'purchase')
            ->select('invoice_no')
            ->first();
        if (empty($invoice)) {
            $invoice = Invoice::orderBy('id', 'desc')
                ->where('type', 'purchase')
                ->select('invoice_no')
                ->first();
            if (empty($invoice)) {
                return 800000;
            }
            return $invoice->invoice_no + 1;
        }

        return $invoice->invoice_no;
    }
}
