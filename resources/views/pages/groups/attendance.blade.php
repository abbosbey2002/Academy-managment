<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dora Academy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        body {
            font-family: "Inter", sans-serif;
            background-color: #f4f5f7;
            margin: 0;
            padding: 0;
        }
        .title {
            margin: 20px 0;
            color: #333;
            text-align: center;
            font-size: 22px;
            font-weight: 600;
        }
        .wrapper {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .btns {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #3454d1;
            font-size: 12px;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: 700;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #2c45b5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fafafa;
        }
        table thead {
            background-color: #3454d1;
            color: #fff;
        }
        table th {
            text-transform: uppercase;
            font-size: 12px;
            padding: 10px;
            text-align: left;
        }
        table tbody tr {
            transition: background-color 0.2s ease;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
        table td {
            font-size: 12px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .container {
            display: block;
            position: relative;
            padding-left: 25px;
            margin: 8px 0;
            cursor: pointer;
            font-size: 12px;
            user-select: none;
        }
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #eee;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }
        .container input:checked ~ .checkmark {
            background-color: #3454d1;
        }
        .container input:checked ~ .checkmark-green {
            background-color: green;
        }
        .container input:checked ~ .checkmark-red {
            background-color: red;
        }
        .container input:checked ~ .checkmark-yellow {
            background-color: yellow;
        }
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        .container input:checked ~ .checkmark:after {
            display: block;
        }
        .container .checkmark:after {
            left: 5px;
            top: 1px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        .inputs {
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
    {{ $currentDate }}
        <h3 class="title">{{$group->group_name}}</h3>
        <div class="btns">
            <a href="{{ route('showAttendance', $group->id) }}" class="btn ">Chiqish <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            <button class="btn" onclick="document.getElementById('attendance-form').submit()">Saqlash</button>
        </div>
        <form id="attendance-form" method="POST" action="{{ route('attendance.store') }}">
            @csrf
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            <input type="hidden" name="date" value="{{ $currentDate }}">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ __('groups.first_last_name')}}  </th>
                        <th>{{ $currentDate }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($group->enrollments as $tm)
                    <tr>
                        <td>{{$tm->id}}</td>
                        <td>{{$tm->first_name}} {{$tm->last_name}}</td>
                        <td class="inputs">
                            <label class="container">bor
                                <input type="radio" name="attendance[{{$tm->id}}]" value="1">
                                <span class="checkmark checkmark-green"></span>
                            </label>
                            <label class="container">yo'q
                                <input type="radio" name="attendance[{{$tm->id}}]" value="2">
                                <span class="checkmark checkmark-red"></span>
                            </label>
                            <label class="container">sababli
                                <input type="radio" name="attendance[{{$tm->id}}]" value="3">
                                <span class="checkmark checkmark-yellow"></span>
                            </label>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>