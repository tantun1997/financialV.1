<!DOCTYPE html>
<html lang="th">

<head>
    <title>{{ $title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-size: 11pt;
            color: #000;
            direction: ltr;
            font-family: "garuda", sans-serif;
        }

        .tableHeader {
            vertical-align: bottom;
            padding-bottom: 10px;
            font-weight: bold;
        }

        .tableHeader td {
            text-align: center;
            line-height: 28px;
        }

        .tableList {
            font-size: 10pt;
            vertical-align: top;
            border: 1px groove #000000;
        }

        .tableList th {
            text-align: center;
            line-height: 25px;
            padding-left: 3px;
            padding-right: 3px;
            border: 1px groove #000000;
        }

        .tableList td {
            line-height: 25px;
            padding-left: 3px;
            padding-right: 3px;
            border: 1px groove #000000;
        }
    </style>
</head>

<body>
    <table width="100%" class="tableHeader" cellspacing="0" cellpadding="0">
        <tr>
            <td>รายละเอียดแนบท้ายบันทึกข้อความ ที่ สส 0033/ผ.{{ $id }} ลงวันที่ {{ $dateExport }}</td>
        </tr>
        <tr>
            <td>

                งานจัดซื้อพัสดุ จำนวน {{ $vwCountDetail }} รายการ ตามแผน {{ $planName }}</td>
        </tr>
        <tr>
            <td>โดยวิธีเฉพาะเจาะจง ซึ่งมีรายละเอียด ดังต่อไปนี้</td>
        </tr>
    </table>

    <table width="100%" class="tableList" style="margin-bottom: 10px;" cellspacing="0" cellpadding="0">
        <tr>
            <th width="50px">ลำดับ</th>
            <th width="165px">หมายเลขพัสดุ</th>
            <th>รายการ</th>
            <th width="110px">อายุการใช้งาน</th>
            <th width="110px">ราคาซื้อ</th>
            <th width="110px">ราคาซ่อม</th>
        </tr>

        @php $number = 1 @endphp

        @foreach ($vwReportEquipDetail as $query)
            <tr>
                <td style="text-align: center;">{{ $number }}</td>
                <td style="text-align: center;">{{ $query->EQUP_ID }}</td>
                <td style="text-align: left;">{{ $query->EQUP_NAME }}</td>
                <td style="text-align: center;">{{ $query->age }} ปี</td>
                <td style="text-align: right;">{{ number_format($query->EQUP_PRICE, 2) }}</td>
                <td style="text-align: right;">{{ number_format($query->price, 2) }}</td>
            </tr>
            @php $number++ @endphp <!-- Increment the counter -->
        @endforeach

        <tr>
            <td colspan="5" style="text-align: left; padding-left: 3px; padding-right: 3px;">รวมเป็นเงินทั้งสิ้น (
                {{ $totalPriceText }} )</td>
            <td style="text-align: right; padding-left: 3px; padding-right: 3px;">{{ number_format($totalPrice, 2) }}
            </td>
        </tr>
    </table>
    <table width="100%" border="0" style="vertical-align: top; padding-top: 20px;">
        <tr>
            <td width="60%"></td>
            <td>
                <table width="100%" border="0" style="vertical-align: top;">
                    <tr>
                        <td width="45px">ลงชื่อ</td>
                        <td class="text_doted_left">&nbsp;</td>
                        <td width="120px">ผู้ขออนุมัติ</td>
                    </tr>
                    <tr>
                        <td width="45px" style="text-align: right;">(</td>
                        <td class="text_doted_left">&nbsp;</td>
                        <td width="120px">)</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>











</body>

</html>