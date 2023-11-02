<?php

namespace App\Console\Commands;

use App\Models\StaticCarrier;
use League\Csv\Reader;
use League\Csv\CharsetConverter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportStaticCarriers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:static-carrier';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import static carrier data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        if (StaticCarrier::count() > 0) {
            DB::table('static_carriers')->truncate();
        }

        $reader = Reader::createFromPath(storage_path('static_carriers/FMCSA.csv'));
        $reader->setOutputBOM(Reader::BOM_UTF16_LE);
        $data = $reader->getRecords();
        try {
            foreach ($data as $key => $row) {
                if ($key == 0) {
                    continue;
                }
                DB::table('static_carriers')->insert([
                    'dot_number' => isset($row[0]) ? trim(preg_replace('/[^[:print:]]/', '', $row[0])) : '',
                    'legal_name' => isset($row[1]) ? trim(preg_replace('/[^[:print:]]/', '', $row[1])) : '',
                    'dba_name' => isset($row[2]) ? trim(preg_replace('/[^[:print:]]/', '', $row[2])) : '',
                    'carrier_operation' => isset($row[3]) ? trim(preg_replace('/[^[:print:]]/', '', $row[3])) : '',
                    'hm_flag' => isset($row[4]) ? trim(preg_replace('/[^[:print:]]/', '', $row[4])) : '',
                    'pc_flag' => isset($row[5]) ? trim(preg_replace('/[^[:print:]]/', '', $row[5])) : '',
                    'phy_street' => isset($row[6]) ? trim(preg_replace('/[^[:print:]]/', '', $row[6])) : '',
                    'phy_city' => isset($row[7]) ? trim(preg_replace('/[^[:print:]]/', '', $row[7])) : '',
                    'phy_state' => isset($row[8]) ? trim(preg_replace('/[^[:print:]]/', '', $row[8])) : '',
                    'phy_zip' => isset($row[9]) ? trim(preg_replace('/[^[:print:]]/', '', $row[9])) : '',
                    'phy_country' => isset($row[10]) ? trim(preg_replace('/[^[:print:]]/', '', $row[10])) : '',
                    'mailing_street' => isset($row[11]) ? trim(preg_replace('/[^[:print:]]/', '', $row[11])) : '',
                    'mailing_city' => isset($row[12]) ? trim(preg_replace('/[^[:print:]]/', '', $row[12])) : '',
                    'mailing_state' => isset($row[13]) ? trim(preg_replace('/[^[:print:]]/', '', $row[13])) : '',
                    'mailing_zip' => isset($row[14]) ? trim(preg_replace('/[^[:print:]]/', '', $row[14])) : '',
                    'mailing_country' => isset($row[15]) ? trim(preg_replace('/[^[:print:]]/', '', $row[15])) : '',
                    'telephone' => isset($row[16]) ? trim(preg_replace('/[^[:print:]]/', '', $row[16])) : '',
                    'fax' => isset($row[17]) ? trim(preg_replace('/[^[:print:]]/', '', $row[17])) : '',
                    'email_address' => isset($row[18]) ? trim(preg_replace('/[^[:print:]]/', '', $row[18])) : '',
                    'mcs150_date' => isset($row[19]) ? trim(preg_replace('/[^[:print:]]/', '', $row[19])) : '',
                    'mcs150_mileage' => isset($row[20]) ? trim(preg_replace('/[^[:print:]]/', '', $row[20])) : '',
                    'mcs150_mileage_year' => isset($row[21]) ? trim(preg_replace('/[^[:print:]]/', '', $row[21])) : '',
                    'add_date' => isset($row[22]) ? trim(preg_replace('/[^[:print:]]/', '', $row[22])) : '',
                    'oic_state' => isset($row[23]) ? trim(preg_replace('/[^[:print:]]/', '', $row[23])) : '',
                    'nbr_power_unit' => isset($row[24]) ? trim(preg_replace('/[^[:print:]]/', '', $row[24])) : '',
                    'driver_total' => isset($row[25]) ? trim(preg_replace('/[^[:print:]]/', '', $row[25])) : '',
                    'recent_mileage' => isset($row[26]) ? trim(preg_replace('/[^[:print:]]/', '', $row[26])) : '',
                    'recent_mileage_year' => isset($row[27]) ? trim(preg_replace('/[^[:print:]]/', '', $row[27])) : '',
                    'vmt_source_id' => isset($row[28]) ? trim(preg_replace('/[^[:print:]]/', '', $row[28])) : '',
                    'private_only' => isset($row[29]) ? trim(preg_replace('/[^[:print:]]/', '', $row[29])) : '',
                    'authorized_for_hire' => isset($row[30]) ? trim(preg_replace('/[^[:print:]]/', '', $row[30])) : '',
                    'exempt_for_hire' => isset($row[31]) ? trim(preg_replace('/[^[:print:]]/', '', $row[31])) : '',
                    'private_property' => isset($row[32]) ? trim(preg_replace('/[^[:print:]]/', '', $row[32])) : '',
                    'private_passenger_business' => isset($row[33]) ? trim(preg_replace('/[^[:print:]]/', '', $row[33])) : '',
                    'private_passenger_nonbusiness' => isset($row[34]) ? trim(preg_replace('/[^[:print:]]/', '', $row[34])) : '',
                    'migrant' => isset($row[35]) ? trim(preg_replace('/[^[:print:]]/', '', $row[35])) : '',
                    'us_mail' => isset($row[36]) ? trim(preg_replace('/[^[:print:]]/', '', $row[36])) : '',
                    'federal_government' => isset($row[37]) ? trim(preg_replace('/[^[:print:]]/', '', $row[37])) : '',
                    'state_government' => isset($row[38]) ? trim(preg_replace('/[^[:print:]]/', '', $row[38])) : '',
                    'local_government' => isset($row[39]) ? trim(preg_replace('/[^[:print:]]/', '', $row[39])) : '',
                    'indian_tribe' => isset($row[40]) ? trim(preg_replace('/[^[:print:]]/', '', $row[40])) : '',
                    'op_other' => isset($row[41]) ? trim(preg_replace('/[^[:print:]]/', '', $row[41])) : ''
                ]);
            }
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
        }
        
    }
}
