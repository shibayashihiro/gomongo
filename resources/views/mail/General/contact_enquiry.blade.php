@extends('layouts.mail.app')
@section('content')
    <tr>
        <td style="padding: 50px 45px 25px 45px; font-family: arial; font-size: 15px; color: #333; line-height: normal;"
            width="550">Hello</td>
    </tr>
    @if(isset($data['full_name']))
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Full Name:</b> {{$data['full_name']}}
        </td>
    </tr>
    @endif
    @if(isset($data['first_name']))
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>First Name:</b> {{$data['first_name']}}
        </td>
    </tr>
    @endif
    @if(isset($data['last_name']))
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Last Name:</b> {{$data['last_name']}}
        </td>
    </tr>
    @endif
    @if(isset($data['email']))
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Email:</b> {{$data['email']}}
        </td>
    </tr>
    @endif
    @if(isset($data['phone']))
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Phone:</b> {{$data['phone']}}
        </td>
    </tr>
    @endif
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Message:</b> {{$data['message']}}
        </td>
    </tr>
@endsection
