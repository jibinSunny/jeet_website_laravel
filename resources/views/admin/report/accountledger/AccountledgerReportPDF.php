<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div style="margin-bottom: 50px;">
        <div class="row">
            <div class="reportPage-header">
                <span class="header"><img class="logo" src=""></span>
                <p class="title"></p>
                <p class="title-desc"></p>
                <p class="title-desc"></p>
            </div>
            <div style="margin-bottom: -5px">
                <h3> - </h3>
            </div>
            <?php if($fromdate !='' && $todate !='') { ?>
                <div>
                    <h5 class="pull-left"> : </h5>  
                    <h5 class="pull-right"> : </h5>
                </div>
            <?php } ?>
            <div class="accountledgerreport">

                <div class="singleaccountledger">
                    <table class="ledgertable">
                        <tr>
                            <td class="text-bold" colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td></span></td>
                            <td></td>
                        </tr>
                    </table>

                    <table class="ledgertable">
                        <tr>
                            <td class="text-bold" colspan="2"></td>
                        </tr>
                        <tr>
                            <td>(+)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>(+)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>(+)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>(-)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>(-)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span class="text-bold"></span></td>
                            <td>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="singleaccountledger marginledger">
                
                    <table class="ledgertable">
                        <tr>
                            <td class="text-bold" colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td><span class="text-bold"></span></td>
                            <td></td>
                        </tr>
                    </table>
                
               
                    <table class="ledgertable">
                        <tr>
                            <td class="text-bold" colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td><span></span></td>
                            <td></td>
                        </tr>
                    </table>
                    <table class="ledgertable">
                        <tr>
                            <td class="text-bold" colspan="2"><?=$this->lang->line('accountledgerreport_expense')?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><?=$this->lang->line('accountledgerreport_expense_des')?></td>
                        </tr>
                        <tr>
                            <td><?=$this->lang->line('accountledgerreport_total')?> <span class="text-bold"><?=!empty($siteinfos->currency_code) ? "(".$siteinfos->currency_code.")" : ''?></span></td>
                            <td><?=number_format($totalexpense,2)?></td>
                        </tr>
                    </table>
                    
                    <table class="ledgertable">
                        <tr>
                            <td class="text-bold" colspan="2"><?=$this->lang->line('accountledgerreport_salary')?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><?=$this->lang->line('accountledgerreport_salary_des')?></td>
                        </tr>
                        <tr>
                            <td><?=$this->lang->line('accountledgerreport_total')?> <span class="text-bold"><?=!empty($siteinfos->currency_code) ? "(".$siteinfos->currency_code.")" : ''?></span></td>
                            <td><?=number_format($totalsalarypayment,2)?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="text-center footerAll">
                <?=reportfooter($siteinfos, $schoolyearsessionobj, true)?>
            </div>
        </div><!-- row -->
    </div><!-- Body -->
</body>
</html>