<div class="container-fluid mt-3">
    <h2>รายการด้านพัฒนาระบบบริการและสนับสนุนบริการสุขภาพ</h2>


    <div style="display: flex; justify-content: space-between; align-items: center;">
        <a class="btn btn-danger" href="{{ route('financial_report') }}" role="button">ย้อนกลับ</a>
    </div>
    <br>
    <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item">
            <button class="nav-link active" id="plan_true-tab" data-bs-toggle="tab" data-bs-target="#plan_true"
                type="button" aria-controls="plan_true" aria-selected="true">แผนจริง</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="plan_spare-tab" data-bs-toggle="tab" data-bs-target="#plan_spare"
                type="button" aria-controls="plan_spare" aria-selected="false">แผนสำรอง</button>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="plan_true" aria-labelledby="plan_true-tab">
            <table id="dataTable1" class="table table-bordered table-hover table-sm" style="width: 100%;">
                <thead>
                    <tr style="background-color: rgb(209, 209, 209)">
                        <td>แผนก</td>
                        <td>วงเงินทั้งหมด(บาท)</td>
                        <td>ใช้แล้ว(บาท)</td>
                        <td>คงเหลือ(บาท)</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $seenNames = [];
                    @endphp

                    @foreach ($plan_true as $key => $item)
                        @if (!in_array($item->TCHN_LOCAT_NAME, $seenNames))
                            @php
                                $seenNames[] = $item->TCHN_LOCAT_NAME;
                            @endphp
                            <tr class="clickable-row" data-bs-toggle="collapse"
                                data-bs-target="#itemDetail1{{ $key }}" aria-expanded="false"
                                aria-controls="itemDetail1{{ $key }}"
                                style="cursor: pointer; background-color: rgb(157, 193, 248)">
                                <th class="click_sharp">{{ $item->TCHN_LOCAT_NAME }}</th>

                                <th>{{ number_format(round($item->total_price), 2) }}</th>
                                <th>{{ number_format(round($item->total_current_price), 2) }}</th>
                                <th>{{ number_format(round($item->total_price - $item->total_current_price), 2) }}</th>
                            </tr>
                        @endif
                        @php
                            $detailItems = DB::table('วงเงินแต่ละแผนก')
                                ->where('WK_Group', 'ด้านพัฒนาระบบบริการและสนับสนุนบริการสุขภาพ')
                                ->where('Plan_LEVEL', 1)
                                ->where('TCHN_LOCAT_NAME', $item->TCHN_LOCAT_NAME)
                                ->get();
                        @endphp
                        @foreach ($detailItems as $query)
                            <tr id="itemDetail1{{ $key }}" class="collapse">

                                <td><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="-5 0 20 27" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                        <path d="m9 19 8-7-8-7z"></path>
                                    </svg> {{ $query->TYPE_NAME }}
                                </td>
                                <td>
                                    {{ number_format(round($query->Total_Price), 2) }}
                                </td>
                                <td>
                                    {{ number_format(round($query->Total_Current_Price), 2) }}

                                </td>
                                <td>{{ number_format(round($query->Total_Price - $query->Total_Current_Price), 2) }}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach

                </tbody>
            </table>

        </div>
        <div class="tab-pane" id="plan_spare" aria-labelledby="plan_spare-tab">
            <table id="dataTable2" class="table table-bordered table-hover table-sm" style="width: 100%;">
                <thead>
                    <tr style="background-color: rgb(209, 209, 209)">
                        <td>แผนก</td>
                        <td>วงเงินทั้งหมด(บาท)</td>
                        <td>ใช้แล้ว(บาท)</td>
                        <td>คงเหลือ(บาท)</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $seenNames = [];
                    @endphp

                    @foreach ($plan_spare as $key => $item)
                        @if (!in_array($item->TCHN_LOCAT_NAME, $seenNames))
                            @php
                                $seenNames[] = $item->TCHN_LOCAT_NAME;
                            @endphp
                            <tr class="clickable-row" data-bs-toggle="collapse"
                                data-bs-target="#itemDetail2{{ $key }}" aria-expanded="false"
                                aria-controls="itemDetail2{{ $key }}"
                                style="cursor: pointer; background-color: rgb(157, 193, 248)">
                                <th class="click_sharp">{{ $item->TCHN_LOCAT_NAME }}</th>

                                <th>{{ number_format(round($item->total_price), 2) }}</th>
                                <th>{{ number_format(round($item->total_current_price), 2) }}</th>
                                <th>{{ number_format(round($item->total_price - $item->total_current_price), 2) }}</th>
                            </tr>
                        @endif
                        @php
                            $detailItems = DB::table('วงเงินแต่ละแผนก')
                                ->where('WK_Group', 'ด้านพัฒนาระบบบริการและสนับสนุนบริการสุขภาพ')
                                ->where('Plan_LEVEL', 2)
                                ->where('TCHN_LOCAT_NAME', $item->TCHN_LOCAT_NAME)
                                ->get();
                        @endphp
                        @foreach ($detailItems as $query)
                            <tr id="itemDetail2{{ $key }}" class="collapse">

                                <td><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="-5 0 20 27" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                        <path d="m9 19 8-7-8-7z"></path>
                                    </svg> {{ $query->TYPE_NAME }}
                                </td>
                                <td>
                                    {{ number_format(round($query->Total_Price), 2) }}
                                </td>
                                <td>
                                    {{ number_format(round($query->Total_Current_Price), 2) }}

                                </td>
                                <td>{{ number_format(round($query->Total_Price - $query->Total_Current_Price), 2) }}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    <style>
        .clickable-row .click_sharp {
            position: relative;

        }

        .clickable-row .click_sharp::before {
            font-size: 1.2em;
            /* เพิ่มขนาดของลูกศรเป็น 1.5 เท่าของขนาดธรรมดา */
            content: '\203A';
            /* รหัส Unicode ของลูกศรเน้นขึ้น */
            position: absolute;
            left: 95%;
            top: 50%;
            transform: translateY(-50%);
            /* เพิ่มการหมุนลูกศร 90 องศา */
            transition: transform 0.3s ease;
            /* เพิ่ม transition เพื่อให้การเคลื่อนไหวมีความนุ่มนวล */
        }

        .clickable-row:hover .click_sharp::before,
        .clickable-row.expanded .click_sharp::before {
            transform: translateY(-50%) rotate(90deg);
            /* หมุนลูกศรกลับทิศตรงข้ามเมื่อโฮเวอร์หรือกดคลิก */
        }
    </style>
</div>
