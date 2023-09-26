<?php

namespace App\Http\Controllers;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use App\Models\Order;
use App\Models\Client;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;

class DownloadPdfController extends Controller
{
    // public function download(Order $record)
    // {
    //     $customer = new Buyer([
    //         'name'          => 'John Doe',
    //         'custom_fields' => [
    //             'email' => 'test@example.com',
    //         ],
    //     ]);

    //     $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

    //     $invoice = Invoice::make()
    //         ->buyer($customer)
    //         ->discountByPercent(10)
    //         ->taxRate(15)
    //         ->shipping(1.99)
    //         ->addItem($item);

    //     return $invoice->stream();
    // }

    public function download(Order $record)
    {
        // $order = Order::findOrFail();
        $brand  = Brand::find($record->brand_id);
        $client  = Client::find($record->client_id);
        $product  = Product::find($record->product_id);
        $status  = Status::find($record->status_id);
        $clientname = $record->client_id;
        $dateStart = $record->period_start;
        // dd($record);
        // $clientname = $order->client_name;
        // $clientname = $order->client_name;

        $client = new Party([
            'name'          => $client->client_name,
            'address'         => $client->address,
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          => $brand->brand_name,
            'address'       => $dateStart,
            'code'          => '#22663214',
            'custom_fields' => [
                'order number' => '> 654321 <',
            ],
        ]);

        // $items = [];
        // foreach($product as $raw) {
        //     $item = (new InvoiceItem())
        //             ->title($raw->product_name)
        //             ->description($raw->product_desc)
        //             ->pricePerUnit($raw->price)
        //             ->quantity(1)
        //             ->taxByPercent(10);
        //     $items[] = $item;
        // }

        $items = [
            (new InvoiceItem())
                ->title('Test: Web')
                ->description('Website')
                ->pricePerUnit(15000)
                ->quantity(1)
                ->discountByPercent(10),
                // ->taxByPercent(10),
            (new InvoiceItem())->title('Service 2')->pricePerUnit(71.96)->quantity(2),
            (new InvoiceItem())->title('Service 3')->pricePerUnit(4.56),
            (new InvoiceItem())->title('Service 4')->pricePerUnit(87.51)->quantity(7)->discount(4)->units('kg'),
            (new InvoiceItem())->title('Service 5')->pricePerUnit(71.09)->quantity(7)->discountByPercent(9),
            (new InvoiceItem())->title('Service 6')->pricePerUnit(76.32)->quantity(9),
            (new InvoiceItem())->title('Service 7')->pricePerUnit(58.18)->quantity(3)->discount(3),
            (new InvoiceItem())->title('Service 8')->pricePerUnit(42.99)->quantity(4)->discountByPercent(3),
            (new InvoiceItem())->title('Service 9')->pricePerUnit(33.24)->quantity(6)->units('m2'),
            (new InvoiceItem())->title('Service 11')->pricePerUnit(97.45)->quantity(2),
            (new InvoiceItem())->title('Service 12')->pricePerUnit(92.82),
            (new InvoiceItem())->title('Service 13')->pricePerUnit(12.98),
            (new InvoiceItem())->title('Service 14')->pricePerUnit(160)->units('hours'),
            (new InvoiceItem())->title('Service 15')->pricePerUnit(62.21)->discountByPercent(5),
            (new InvoiceItem())->title('Service 16')->pricePerUnit(2.80),
            (new InvoiceItem())->title('Service 17')->pricePerUnit(56.21),
            (new InvoiceItem())->title('Service 18')->pricePerUnit(66.81)->discountByPercent(8),
            (new InvoiceItem())->title('Service 19')->pricePerUnit(76.37),
            (new InvoiceItem())->title('Service 20')->pricePerUnit(55.80),
        ];

        $notes = [
            'your multiline',
            'additional notes',
            'in regards of delivery or something else',
        ];
        $notes = implode("<br>", $notes);



        $invoice = Invoice::make('Quotation')
            ->series('BIG')
            // ability to include translated invoice status
            // in case it was paid
            // ->status(__('invoices::invoice.paid'))
            ->status(__($status->status))
            ->taxRate(10)
            ->sequence(667)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat('m/d/Y')
            ->payUntilDays(14)
            // ->getDate($dateStart)
            ->currencySymbol('Rp. ')
            ->currencyCode('IDR')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('vendor/invoices/sample-logo.webp'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

            // foreach($items as $item) {
            //     $invoice->addItem($item);
            // }

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}
