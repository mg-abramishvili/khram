<div class="type-9">
    <div class="row">
        <div class="col-12">
            <div class="page-detail-text">

                @if($settings->theme == 'default')
                    <h1 class="mb-4">{{ $page->title }}</h1>
                @elseif($settings->theme == 'nast')
                    <h1 class="mb-4">{{ $page->title }}</h1>
                @endif

                <div class="excel-item">
                    @php
                    include 'vendor/autoload.php';

                    use PhpOffice\PhpSpreadsheet\IOFactory;
                    use PhpOffice\PhpSpreadsheet\Spreadsheet;

                    $filename = 'http://localhost';
                    $filename .= $page->excel;
                    $file = file_get_contents($filename);

                    $inputFileName = 'tmpfile.xlsx';
                    file_put_contents($inputFileName, $file);

                    $reader = IOFactory::createReader('Xlsx');
                    $spreadsheet = $reader->load($inputFileName);
                    $writer = IOFactory::createWriter($spreadsheet, 'Html');
                    $message = $writer->save('php://output');

                    echo $message;
                    @endphp
                </div>

                <script>
                    $('table').css('width','auto');
                    $('table tr td').css('font-weight','400');
                    $('table tr td').css('font-style','normal');
                    $('table tr td').css('min-width','110px');
                    /*$('table tr:first-child td').css('font-weight','700');
                    $('table tr:first-child td').css('text-align','center');
                    $('table tr:first-child td').css('position','sticky');
                    $('table tr:first-child td').css('top','0');
                    $('table tr:first-child td').css('background','#99ffd5');
                    $('table tr td:first-child').css('font-weight','700');
                    $('table tr td:first-child').css('background','#99ffd5');
                    $('table tr td:first-child').css('position','sticky');
                    $('table tr td:first-child').css('left','0');
                    $('table tr td:first-child').css('text-align','center');*/
                </script>

            </div>
        </div>
    </div>
</div>