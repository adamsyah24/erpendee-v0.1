<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Media;
use App\Models\Brand;
use App\Models\QuotationProduct;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF(Order $record)
    {
        $record = Order::with('clientsO', 'brandsO', 'mediaO', 'oQuote')->find($record->id);

        $data = [
            'title' => 'QUOTATION',
            'name' => $record->clientsO->client_name,
            'orderNo' => $record->order_no,
            'orderSeries' => $record->order_series,
            'project' => $record->project,
            'periodStr' => $record->period_start,
            'periodEnd' => $record->period_end,
            'prepared' => $record->prepared,
            'revision' => $record->revision,
            'daterevision' => $record->date_revision,
            'tax' => $record->taxOrder->vat_tax,
            'brands' => $record->brandsO->brand_name,
            'clients' => $record->clientsO->client_name,
            'medias' => $record->mediaO->media_name,
            'total' => 0,
            // 'no' => $items->id,
            'items' => $record->oQuote->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->qProduct->product_name,
                    'remarks' => $item->remarks,
                    'periode' => date('F d', strtotime($item->periodstart)) . ' - ' . date('d F Y', strtotime($item->periodend)),
                    // 'periodawal' => $item->periodstart,
                    // 'periodakhir' => $item->periodend,
                    'cost' => $item->priced,
                    'qty' => $item->qty,
                    'freq' => $item->freq,
                ];
            }),
        ];

        $pdf = PDF::loadView('pdf/myPDF', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream();
    }

    // public function previewPDF(Order $record)
    // {
    //     $clients = Client::get();
    //     $brands = Brand::get();

    //     $data = [
    //         'title' => 'QUOTATION',
    //         'name' => $record->client_name,
    //         'orderNo' => $record->order_no,
    //         'periodStr' => $record->period_start,
    //         'periodEnd' => $record->period_end,
    //         'prepared' => $record->prepared,
    //         'revision' => $record->revision,
    //         'daterevision' => $record->date_revision,
    //         'tax' => $record->tax,
    //         'brands' => $brands,
    //         'clients' => $clients,
    //         // 'total' => 1000000,
    //     ];

    //     $pdf = PDF::loadView('pdf/myPDF', $data);
    //     $pdf->setPaper('A4', 'landscape');

    //     return $pdf->render();
    // }
}
