@extends('layouts.mail.app')
@section('content')
    <tr>
        <td style="padding: 50px 45px 25px 45px; font-family: arial; font-size: 15px; color: #333; line-height: normal;"
            width="550">Hello
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Title:</b> {{$data['title']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>First Name:</b> {{$data['first_name']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Middle Name:</b> {{$data['middle_name']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Last Name:</b> {{$data['last_name']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Email:</b> {{$data['email']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Home Telephone:</b> {{$data['telephone']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Mobile:</b> {{$data['mobile']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Gender:</b> {{$data['gender']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>DOB:</b> {{$data['dob']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Nationality:</b> {{$data['nationality']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Marital Status :</b> {{$data['marital_status']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>No of dependants :</b> {{$data['no_dependant']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Driving Licence :</b> {{$data['driving_licence']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Address :</b> {{$data['address']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Building Name :</b> {{$data['building_name']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Building Number :</b> {{$data['building_number']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Room/floor :</b> {{$data['building_floor']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Street :</b> {{$data['street']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>District :</b> {{$data['district']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>City/Town :</b> {{$data['city']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Post Code :</b> {{$data['postcode']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Residency :</b> {{$data['residency']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Name :</b> {{$data['emp_name']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Occupation :</b> {{$data['emp_occupation']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Occupation Basis :</b> {{$data['emp_occupation_basis']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Occupation Type :</b> {{$data['emp_occupation_type']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Address :</b> {{$data['emp_address']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Building Name :</b> {{$data['emp_building_name']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Building Number :</b> {{$data['emp_building_number']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Building Floor :</b> {{$data['emp_building_floor']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Street :</b> {{$data['emp_street']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee District :</b> {{$data['emp_district']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee City :</b> {{$data['emp_city']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Postcode :</b> {{$data['emp_postcode']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Employee Residency :</b> {{$data['emp_residency']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Bank Sort Code :</b> {{$data['bank_sort_code']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Bank Account Number :</b> {{$data['bank_account_number']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Bank Account Name :</b> {{$data['bank_account_name']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Gross Annual Income :</b> {{$data['gross_annual_income']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Replace Loan :</b> {{$data['replacement_loan']}}
        </td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550"><b>Note :</b> {{$data['note']}}
        </td>
    </tr>
@endsection
