@extends('dashboard.layout.master')

@section('title','Categories')

@section('container')
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
        </tr>
        @php $i=0; @endphp
        @forelse($category as $cate)
        @php $i++; @endphp
        <tr>
            <td>{{$i}}</td>
            <td>{{$cate->cate_name}}</td>
        </tr>
        @empty
        @endforelse
    </table>
    <style>
        table,th,td{
            border: 1px solid black;
        }
        table{
            width: 60%;
            margin: 30px auto;
        }
        th,td{
            padding: 10px;
        }
    </style>
@endsection