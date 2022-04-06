@extends('layouts.header')
@section('content')
<div style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We're thrilled to have you here! Get ready to dive into your new account. </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#008080" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#008080" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Welcome!</h1><hr>
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16"><path d="M2 2h2v2H2V2Z"></path><path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"></path><path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"></path><path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"></path><path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"></path>
                            </svg>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td class="cd-username-title" bgcolor="#ffffff" align="center" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">{{ session('AuthUser')->email }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 30px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#008080"><a href="{{url('add-page/0')}}" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #008080; display: inline-block;">Create something New</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr> 
                        <td bgcolor="#ffffff" align="left"> 
                            <table   width="100%" border="0"  cellspacing="0" cellpadding="0" class="cd-tabel-01" style="margin: 10px 10px 59px 10px;">
                                @if(count($pages)>0)
                                    <h3 style="font-family: cursive; margin:20px 0px 20px 20px" >Here are some pages created by you!</h3>  
                                    @foreach ($pages as $page) 
                                        <tr > 
                                            <td>
                                                <i class="fas fa-star" style="color: gold"></i>
                                            </td>
                                            <td style="padding: 10px 10px 10px 10px; font family: math">     
                                                {{$page->title}}
                                            </td>   
                                            <td>
                                                <a href="/page/{{$page->page_uid}}" title="View"><i class="fas fa-eye" style="color: black"></i></a>
                                            </td>
                                            <td>
                                                <a href="/edit-page/{{$page->page_uid}}" title="Edit"><i class="fas fa-edit" style="color: black"></i></a>
                                            </td>
                                            <td>   
                                                <form action="delete_page" method="post" class="cd-delete-btn-01" id="{{$page->page_uid}}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$page->page_uid}}">
                                                    <button title="Delete" type="button" data-form="{{$page->page_uid}}" class="dlt-btn"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                            <div class="row cd_margin_04">
                                <div class="col-md-12">
                                    <div class="cd_pagination_01">
                                        @if ($pages)
                                            {{$pages->links()}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>   
                    </tr>  
                </table>
            </td>
        </tr>
    </table> 
</div>
{{-- For confirmation of deleting a page --}}
<script>
    $('.dlt-btn').click(function() {
        var dlt = confirm('are you sure you want to delete this?');
        if(dlt){
            var id = $(this).attr('data-form');
            $('#'+id).submit();
        }
    });
</script>
@endsection