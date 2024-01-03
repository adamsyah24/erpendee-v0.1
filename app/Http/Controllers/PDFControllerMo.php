<?php

namespace App\Http\Controllers;

use App\Models\MediaOrder;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFControllerMo extends Controller
{
    public function generatePDF(MediaOrder $record)
    {
        $record = MediaOrder::with('quotationM', 'quotationM.clientsO', 'quotationM.brandsO', 'quotationM.mediaO', 'quotationM.oQuote')->find($record->id);

        $data = [
            'title' => 'Media Order',
            'name' => $record->quotationM->clientsO->client_name,
            'orderNo' => $record->quotationM->order_no,
            'mo_series' => $record->mo_series_number,
            'orderSeries' => $record->quotationM->order_series,
            'project' => $record->quotationM->project,
            'periodStr' => $record->quotationM->period_start,
            'periodEnd' => $record->quotationM->period_end,
            'prepared' => $record->quotationM->prepared,
            'revision' => $record->quotationM->revision,
            'daterevision' => $record->quotationM->date_revision,
            'tax' => $record->quotationM->taxOrder->vat_tax,
            'brands' => $record->quotationM->brandsO->brand_name,
            'clients' => $record->quotationM->clientsO->client_name,
            'medias' => $record->quotationM->mediaO->media_name,
            'total' => 0,
            // 'no' => $items->id,
            'items' => $record->quotationM->oQuote->map(function ($item) {
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

        $pdf = PDF::loadView('pdf/myPDFMo', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream();
    }
}
