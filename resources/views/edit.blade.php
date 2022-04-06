@extends('layouts.header')
@section('content')
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
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> 
    We're thrilled to have you here! Get ready to dive into your new account. 
</div>
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
                            <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Edit this page as {{ session('AuthUser')->email }}</h1> 
                            <hr>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>       
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 30px 10px;">
                <form action="/edit-page" method="POST" class="cd-form-section-01">
                    @csrf
                    <input type="hidden" name="page_uid" value="{{$data->page_uid}}">
                    <table border="0"  bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="100%" style="max-width: 89%;">
                        <tr>
                            <td>
                                <div class="cd-page-title-01">
                                    <label for="name">Name the page</label>
                                    <input type="text" name="title" value="{{$data->title}}">
                                    <span class="text-danger">@error('title') {{$message}} @enderror</span> 
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="cd-username-title" align="center" style="padding: 20px 30px 100px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 400; line-height: 25px;">
                                <textarea name="description" id="editor">
                                    {{$data->description}}
                                </textarea>
                                <span class="text-danger">@error('description') {{$message}} @enderror</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row ms-2 cd-submit-button" style="width: 20%">
                                    <input type="submit" value="Submit" class="btn">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    <script>
        CKEDITOR.replace('editor', {
            width: '100%',
            height: 500,
            removeButtons: 'PasteFromWord'
        });
   </script>
@endsection