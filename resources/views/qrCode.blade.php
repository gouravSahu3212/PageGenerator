@extends('layouts.header')
@section('content')

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#008080" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 85%;">
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#008080" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 85%;">
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h1 style="font-size: 48px; font-weight: 400; margin: 2;">MyQR</h1> 
                        <hr>
                    </td>
                </tr>
            </table>
        </td>
    </tr>       
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 30px 10px;">
            <form action="/add-page" method="POST" class="cd-form-section-01">
                @csrf
                <table border="0" cellpadding="0" bgcolor="#ffffff" cellspacing="0" width="100%" style="max-width: 89%;">
                    <tr>
                        <td>
                            <div class="cd-barcode-img-01">  {!! $qr_data->qr_img !!}  </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="cd-username-title" align="center" style="padding: 20px 30px 100px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 400; line-height: 25px;">
                            <div class="cd-social-icon-section">
                                <p>Scan this image to access the page</p>
                                <p>Share this QR on :-</p>
                                <a class="cd-share-item" title="Whatsapp" href="https://api.whatsapp.com/send?text={{url('qr-image/'.$page_uid)}}" class="whatsapp-share">
                                    <i class="fab fa-whatsapp cd-icon-01"></i>
                                </a>
                                <a class="cd-share-item" title="Facebook" style="text-decoration: none" href="https://www.facebook.com/sharer/sharer.php?u={{url('qr-image/'.$page_uid)}}&quote=Scan the QR!!">
                                    <i class="fab fa-facebook-f cd-icon-f-02"></i>
                                </a>
                                <a class="cd-share-item" title="Twitter" href="https://twitter.com/intent/tweet?text=Scan the QR!!&url={{url('qr-image/'.$page_uid)}}">
                                    <i class="fab fa-twitter cd-icon-twitter-01"></i>
                                </a>
                                <a class="cd-share-item" title="Linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url={{url('qr-image/'.$page_uid)}}">
                                    <i class="fab fa-linkedin-in cd-icon-01"></i>
                                </a>
                                <span class="cd-share-item" title="Copy link" style="cursor: pointer;">
                                    <span class="cd-icon-01-P">
                                        <i class="fas fa-share-alt-square cd-icon-01" onclick="copyLink();"></i>
                                    </span>
                                    <span class="cd-tooltip-01">
                                        <small id="myTooltip" ></small>
                                    </span>
                                    
                                </span>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
{{-- Script for copying link of the page to the clipboard --}}
<script>
    function copyLink() {
      navigator.clipboard.writeText("{{url('/qr-image/' . $page_uid)}}");
      document.getElementById("myTooltip").innerHTML = "Copied!";
    }
</script>
@endsection