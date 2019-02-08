<?php

namespace Opanegro\CardExportDefaultTemplateExcel\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Maatwebsite\Excel\Facades\Excel;
use Opanegro\CardExportDefaultTemplateExcel\Exports\ExportToExcel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CardController extends Controller
{
    public function storeExcel(Request $request, ResponseFactory $responseFactory): BinaryFileResponse
    {
        $resourceDefaultTemplate = explode(',', $request->resourceDefaultTemplate);
        $file_name = $request->resource.'.xlsx';
        $path = storage_path('app/public/exports/' . $file_name);
        Excel::store(new ExportToExcel($resourceDefaultTemplate), 'public/exports/' . $file_name);
        return $responseFactory->download($path, $file_name, ['Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])->deleteFileAfterSend(true);
    }
}
