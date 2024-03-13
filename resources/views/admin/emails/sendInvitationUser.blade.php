@php
$home_link = url('/');
@endphp

<!doctype html>
<html lang="en">
    <body style="margin:0;font-family: Futura,Trebuchet MS,Arial,sans-serif;font-size:14px;color:#000;line-height: 20px;">
        <table width="100%" bgcolor="#E6E6E6" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <table width="620" bgcolor="#ffffff" cellpadding="30" align="center">
                        <tr>
                            <td align="center" valign="top">
                                <table width="560">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <a href="{{url('/')}}" >
                                                                <img src="" width="" alt="">
                                                            </a>
                                                        </td>
                                                        <td width="30"></td>
                                                        <td width="2" style="border-right: 1.5px solid #20706B"></td>
                                                        <td width="30"></td>
                                                        <td>
                                                            <a href="{{url('/')}}" style="text-decoration:none;text-transform: uppercase;font-size: 24px;color:#20706b;">
                                                                <font family="Futura" face="arial">Jeet Meet</font>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font family="Futura" face="arial">Dear <b>{{$name}},</b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="15"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font family="Futura" face="arial"> <br>
                                                    Your username is {{$email}} <br>
                                                    Follow the link for reset your password and login :
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="10"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{$resetLink}}" style="text-decoration: none;color:#5ea18d"><font family="Futura" face="arial">{{$resetLink}}</font></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="15"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font family="Futura" face="arial">Jeet Meet</font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="40"></td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom: 1.5px solid #20706B"></td>
                                        </tr>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table align="center" style="font-size: 13px;">
                                                    <tr>
                                                        <td align="center">
                                                            <font family="Futura" face="arial">Powered by</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                            <a href="#" style="text-decoration: none;">
                                                                <img src="" width="110" alt="">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                            <font family="Futura" face="arial">Jeet-Meet.</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="12"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                            <a href="" style="text-decoration: none;color:#bcbfc2;font-size: 12px;"><font family="Futura" face="arial">TERMS</font></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
