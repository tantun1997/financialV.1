<!DOCTYPE html>
<html lang="th">

<head>
    <title>บันทึกข้อความ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-size: 11pt;
            color: #000;
            direction: ltr;
            font-family: "garuda", sans-serif;
        }

        td {
            line-height: 23px;
        }

        .header td {
            line-height: 27px;
        }

        strong {
            font-weight: bold;
        }

        .headerText {
            font-size: 13pt;
            font-weight: bold;

        }

        .table_doted_left {
            border-bottom: 1px dotted #999;
            text-align: left;
            text-decoration: none;
        }

        .table_doted_center {
            border-bottom: 1px dotted #999;
            text-align: center;
            text-decoration: none;
        }

        .text_doted_left {
            border-bottom: 1px dotted #999;
            text-align: left;
            text-decoration: none;
        }

        .text_doted_center {
            border-bottom: 1px dotted #999;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <table width="100%" class="header" style="vertical-align: bottom; padding-bottom: 10px; padding-top: 20px;"
        cellspacing="0" cellpadding="0">
        <tr>
            <td width="1px">
                <img src="/assets/img/logo.png" width="46" height="51" />
            </td>
            <td style="text-align: center"><strong style="font-size: 19pt">บันทึกข้อความ</strong></td>
        </tr>
    </table>
    <table width="100%" class="header" style="vertical-align: bottom;">
        <tr>
            <td width="110px" class="headerText">ส่วนราชการ</td>
            <td class="table_doted_left">
                กลุ่มงาน/ฝ่าย/งาน{{ $Plan_DEPT }}&nbsp;&nbsp;&nbsp;โทร. {{ $tel }}</td>
        </tr>
    </table>
    <table width="100%" class="header" style="vertical-align: top;">
        <tr>
            <td width="30px" class="headerText">ที่</td>
            <td class="table_doted_left">สส 0033/ผ.{{ $id }}</td>
            <td width="50px" class="headerText">วันที่</td>
            <td width="170px" class="table_doted_center">&nbsp; {{ $dateExport }} &nbsp;</td>
        </tr>
    </table>
    <table width="100%" class="header" style="vertical-align: top; padding-bottom: 3px;">
        <tr>
            <td width="50px" class="headerText">เรื่อง</td>
            <td class="table_doted_left">ขออนุมัติในหลักการจัดซื้อ/จัดจ้าง</td>
        </tr>
    </table>
    <table width="100%" class="header" style="vertical-align: bottom; padding-bottom: 3px;">
        <tr>
            <td width="50px">เรียน</td>
            <td>ผู้อำนวยการโรงพยาบาลสมเด็จพระพุทธเลิศหล้า</td>
        </tr>
    </table>
    <table width="100%" style="vertical-align: top; padding-bottom: 3px;">
        <tr>
            <td width="50px"></td>
            <td width="140px" style="word-break: keep-all;  text-align: justify;">
                ด้วยกลุ่มงาน/ฝ่าย/งาน
            </td>
            <td style="padding-left:50px; border-bottom: 1px dotted #999;">{{ $Plan_DEPT }}</td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td colspan="2" style="word-break: keep-all;  text-align: justify;">
                ได้รับอนุมัติให้ดำเนินการตามแผนเงินบำรุง/งบประมาณ
                ประจำปี {{ $Plan_YEAR }} โดยมีรายละเอียดดังนี้
            </td>
        </tr>
    </table>
    <table width="100%" style="vertical-align: top; padding-bottom: 3px;">
        <tr>
            <td width="50px"></td>
            <td width="5px">1.</td>
            <td style="word-break: keep-all; text-align: justify; word-spacing: -0.3px">ชื่อแผนงาน
                {{ $Plan_NAME }}</td>
        </tr>
    </table>
    <table width="100%" style="vertical-align: top; padding-bottom: 3px;">
        <tr>
            <td width="50px"></td>
            <td width="5px">2.</td>
            <td style="word-break: keep-all; text-align: justify; word-spacing: -0.3px">
                เหตุผลความจำเป็น คือ {{ $Plan_REASON }}
            </td>
        </tr>
    </table>
    <table width="100%" style="vertical-align: top;">
        <tr>
            <td width="50px"></td>
            <td width="5px">3.</td>
            <td>
                รายละเอียดของงานที่จะซื้อ/จ้าง จำนวน {{ $Total_Used }} รายการ ดังนี้
                ตามเอกสารแนบ
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table width="100%" style="vertical-align: top;">
                    @php
                        $equipments = [];
                        $count = 1;
                    @endphp
                    @foreach ($List_Equip as $item)
                        @php
                            $key =
                                $item->Equip_NAME .
                                '-' .
                                $item->Equip_AMOUNT .
                                '-' .
                                round($item->Equip_CURRENT_PRICE, 2);
                            if (array_key_exists($key, $equipments)) {
                                $equipments[$key]['Equip_AMOUNT'] += $item->Equip_AMOUNT;
                            } else {
                                $equipments[$key] = [
                                    'Equip_NAME' => $item->Equip_NAME,
                                    'Equip_AMOUNT' => $item->Equip_AMOUNT,
                                    'Equip_CURRENT_PRICE' => round($item->Equip_CURRENT_PRICE, 2),
                                ];
                            }
                        @endphp
                    @endforeach

                    @foreach ($equipments as $key => $equipment)
                        <tr>
                            <td width="65px"></td>
                            <td style="text-align: justify; word-spacing: -0.3px">
                                {{ $count++ }}. {{ $equipment['Equip_NAME'] }} ราคา
                                {{ number_format($equipment['Equip_AMOUNT'], 0) }}x{{ number_format($equipment['Equip_CURRENT_PRICE'], 2) }}
                                บาท
                            </td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
    <table width="100%" style="vertical-align: top; padding-bottom: 3px;">
        <tr>
            <td width="50px"></td>
            <td width="5px">4.</td>
            <td>
                วงเงินที่จะซื้อ/จ้าง {{ number_format(round($Remaining_Price, 2), 2) }} บาท
                ({{ $Remaining_Price_Text }})
            </td>
        </tr>
    </table>
    <table width="100%" style="vertical-align: top; padding-bottom: 3px;">
        <tr>
            <td width="50px"></td>
            <td width="5px">5.</td>
            <td>เอกสารแนบท้าย</td>
        </tr>
        <tr>
            <td colspan="3">
                <table width="100%" style="vertical-align: bottom; padding-bottom: 3px;">
                    <tr>
                        <td width="60px"></td>
                        <td width="10px"><img src="/assets/img/true_box.png" width="22" height="22"
                                style="padding-bottom: 3px;" /></td>
                        <td width="75px">ใบส่งซ่อม</td>
                        <td width="10px"><img src="/assets/img/true_box.png" width="22" height="22"
                                style="padding-bottom: 3px;" /></td>
                        <td width="85px">แคตตาล็อค</td>
                        <td width="10px"><img src="/assets/img/true_box.png" width="22" height="22"
                                style="padding-bottom: 3px;" /></td>
                        <td width="95px">ใบเสนอราคา</td>
                        <td width="10px"><img src="/assets/img/true_box.png" width="22" height="22"
                                style="padding-bottom: 3px;" /></td>
                        <td>อื่น ๆ ....................</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table width="100%" style="vertical-align: bottom; padding-bottom: 3px;">
        <tr>
            <td width="95px">&nbsp;</td>
            <td>จึงเรียนมาเพื่อโปรดพิจารณา</td>
        </tr>
    </table>
    <table width="100%" style="vertical-align: top; padding-bottom: 3px;">
        <tr>
            <td width="50%">
                <br>
                <table width="100%" style="vertical-align: top; padding-bottom: 3px; font-size: 10pt;">
                    <tr>
                        <td colspan="2">หน.กลุ่มภารกิจ/กลุ่มงาน ตรวจสอบแล้ว อยู่ใน</td>
                    </tr>
                    <tr>
                        <td width="10px"><img src="/assets/img/true_blue.png" width="20" height="20" />
                        </td>
                        <td>แผนเงินบำรุง/งบประมาณ ปี {{ $Plan_YEAR }}</td>
                    </tr>
                    <tr>
                        <td width="10px"><img src="/assets/img/true_box.png" width="20" height="20" /></td>
                        <td>ไม่อยู่ในแผน / เหตุผลความจำเป็น</td>
                    </tr>
                    <tr>
                        <td width="10px"><img src="/assets/img/true_box.png" width="20" height="20" /></td>
                        <td>วงเงินในแผน คงเหลือ</td>
                    </tr>
                    <tr>
                        <td width="10px"></td>
                        <td style="vertical-align: top;">
                            <table width="100%" style="vertical-align: top;">
                                <tr>
                                    <td width="10px"><img src="/assets/img/true_box.png" width="20"
                                            height="20" /></td>
                                    <td>เพียงพอ</td>
                                    <td width="10px"><img src="/assets/img/true_box.png" width="20"
                                            height="20" /></td>
                                    <td>ไม่เพียงพอ</td>
                                    <td>เห็นควรดำเนินการ</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <table width="80%" style="vertical-align: top; padding-bottom: 3px;">
                                <tr>
                                    <td width="1px">&nbsp;</td>
                                    <td class="text_doted_left">&nbsp;</td>
                                    <td width="1px">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>(</td>
                                    <td class="text_doted_left">&nbsp;</td>
                                    <td>)</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td class="text_doted_left">&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="50%">
                <table width="100%" style="vertical-align: top; padding-bottom: 60px;">
                    <tr>
                        <td width="45px">ลงชื่อ</td>
                        <td class="text_doted_left">&nbsp;</td>
                        <td width="120px">(หัวหน้ากลุ่มงาน)</td>
                    </tr>
                    <tr>
                        <td width="45px" style="text-align: right;">(</td>
                        <td class="text_doted_left">&nbsp;</td>
                        <td width="120px">)</td>
                    </tr>
                </table>
                <table width="100%" style="vertical-align: top; padding-bottom: 3px;">
                    <tr>
                        <td style="text-align: center;">ผู้อำนวยการ/ผู้ได้รับมอบหมาย</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <table width="90%" style="vertical-align: top;">
                                <tr>
                                    <td width="10px"><img src="/assets/img/true_box.png" width="20"
                                            height="20" /></td>
                                    <td width="50px" style="text-align: left;">อนุมัติ</td>
                                    <td width="10px"><img src="/assets/img/true_box.png" width="20"
                                            height="20" /></td>
                                    <td style="text-align: left;">ไม่อนุมัติ</td>
                                </tr>
                                <tr>
                                    <td width="10px"><img src="/assets/img/true_box.png" width="20"
                                            height="20" /></td>
                                    <td colspan="3" class="text_doted_left"></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table width="100%" style="vertical-align: top; padding-bottom: 3px;">
                                            <tr>
                                                <td width="1px">&nbsp;</td>
                                                <td class="text_doted_left">&nbsp;</td>
                                                <td width="1px">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>(</td>
                                                <td class="text_doted_left">&nbsp;</td>
                                                <td>)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <table width="100%"
                                                        style="vertical-align: top; padding-bottom: 3px;">
                                                        <tr>
                                                            <td width="33%" class="text_doted_left"
                                                                style="text-align: right;">&nbsp;</td>
                                                            <td class="text_doted_left" style="text-align: right;">
                                                                &nbsp;</td>
                                                            <td width="33%" class="text_doted_left">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
