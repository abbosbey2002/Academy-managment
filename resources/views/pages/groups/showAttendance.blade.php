<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>Attendance Sheet</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
<style>
  .day { cursor: pointer; }
  body { background-color: #f4f5f7; margin: 0; padding: 0; }
  .day.unchecked { background-color: #dc3545 !important; color: white; }
  .container-fluid { background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.3); }
  .btn { background-color: #3454d1; font-size: 10px; color: #fff; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; text-transform: uppercase; font-weight: 700; transition: background-color 0.3s ease; align-items: center; gap: 5px; text-decoration: none; }
  table td { display: table-cell; vertical-align: inherit; font-weight: bold; text-align: center; }
  table thead { background-color: #3454d1 !important; font-size: 10px; color: white; }
  .table-bordered td, .table-bordered th { border: 1px solid #dee2e6; }
  .table-bordered td { font-size: 10px; }
  table { width: 100%; border-collapse: collapse; border-radius: 8px; overflow: hidden; background-color: #fafafa; }
  .table-responsive { overflow-x: auto; }
  @media (max-width: 768px) {
    .btn { font-size: 10px; padding: 6px 12px; }
    table thead { font-size: 8px; }
    .table-bordered td { font-size: 8px; }
  }
  @media (max-width: 576px) {
    .btn { font-size: 8px; padding: 4px 8px; }
    table thead { font-size: 8px; }
    .table-bordered td { font-size: 8px; }
  }
</style>
</head>
<body>
<div class="container-fluid px-3 mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
          <a class="btn" href="{{ route('groups.show', $group->id) }}" >
              {{ __('messages.general.back')}} <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </a>
        <a id="attendanceButton" href="{{ route('studentAttendance', $group->id) }}" class="btn" style="background-color: #3454d1; font-size:10px;" >
            {{ __('groups.get_attendance')}} +
        </a>



      </div>
      <div class="d-flex">
          <input type="month" id="month" name="month" class="form-control" />
          <input type="hidden" id="group_id" name="group_id" class="form-control" value="{{$group->id}}" />
          <button class="btn ml-2" type="submit" style="background-color: #3454d1;" onclick="fetchMonthAttendance()">
              {{ __('groups.check')}}
          </button>
      </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead class="btn-primary" id="header-container">
            <tr>
                <th>ID</th>
                <th>{{ __('groups.first_last_name')}} </th>
                @php
                    $daysInMonth = $startOfMonth->daysInMonth;
                    $monthName = $startOfMonth->format('M');
                @endphp
                @for ($i = 1; $i <= $daysInMonth; $i++)
                    <th>   {{ $i }} {{ $monthName }} </th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->first_name }} <br> {{ $student->last_name }}</td>
                    @for ($day = 1; $day <= $daysInMonth; $day++)
                        @php
                            $currentDate = $startOfMonth->copy()->addDays($day - 1)->format('Y-m-d');
                            $studentAttendance = \App\Models\Attendance::where('student_id', $student->id)
                                ->whereDate('date', $currentDate)
                                ->first();
                            $status = $studentAttendance ? $studentAttendance->status : '-';
                        @endphp
                        <td>@if($status == 1)
                            <i class="fa-solid fa-circle-check" style="font-size: 14px; color: green;"></i>
                        
                        @elseif($status == 2)
                         <i class="fa-solid fa-circle-xmark" style="font-size: 14px; color: red;"></i>
                        
                        @elseif($status == 3)
                         <i class="fa-solid fa-circle-question" style="font-size: 14px; color: #b3a349;"></i>
                        
                        @else
                           -
                        @endif
                        
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>

<script>
// document.addEventListener("DOMContentLoaded", function() {
//     // LocalStorage'dan tugma bosilgan vaqtni olish
//     const lastClickDate = localStorage.getItem("attendanceButtonClickDate");
//     const today = new Date().toISOString().slice(0, 10); // bugungi sanani YYYY-MM-DD formatida olish

//     // Agar tugma bugun bosilgan bo'lsa, uni o'chirib qo'yamiz
//     if (lastClickDate === today) {
//         document.getElementById("attendanceButton").classList.add("disabled");
//         document.getElementById("attendanceButton").style.pointerEvents = "none";
//     }
// });

// function addAttendance(event, button) {
//     // Bugungi sanani YYYY-MM-DD formatida olish
//     const today = new Date().toISOString().slice(0, 10);
//     const lastClickDate = localStorage.getItem("attendanceButtonClickDate");

//     // Agar tugma bugun allaqachon bosilgan bo'lsa, hodisani bekor qilish
//     if (lastClickDate === today) {
//         event.preventDefault();
//         console.log("Bugun davomat allaqachon olingan!");
//         return;
//     }

//     // LocalStorage'ga tugma bosilgan vaqtni saqlash
//     localStorage.setItem("attendanceButtonClickDate", today);

//     // Tugmani o'chirib qo'yish
//     button.classList.add("disabled");
//     button.style.pointerEvents = "none";

//     // Sizning mavjud addAttendance funksiyangizni bu yerda ishlating
//     console.log("Davomat olindi!");
// }





document.addEventListener('DOMContentLoaded', function() {
    const monthInput = document.getElementById('month');
    monthInput.value = getCurrentYearMonth();
});

function getCurrentYearMonth() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0'); // getMonth() returns 0-11, so add 1
    return `${year}-${month}`;
}

function fetchMonthAttendance() {
    const monthInput = document.getElementById('month');
    const groupId = document.getElementById('group_id');
    if (monthInput) {
        const selectedMonth = monthInput.value;
        const selectedGroup = groupId.value;

        fetch("https://academy.dora.uz/api/get-month-attendance", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ month: selectedMonth, group_id: selectedGroup })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                console.error('Error from server:', data.error);
            } else {
                updateTableHeader(data.daysInMonth, data.monthName);
                updateTableBody(data.attendanceData);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

function updateTableHeader(daysInMonth, monthName) {
    const headerContainer = document.querySelector('#header-container tr');
    if (headerContainer) {
        // Clear existing header cells except the first two (ID and Ism Familiya)
        while (headerContainer.cells.length > 2) {
            headerContainer.deleteCell(2);
        }

        // Add new header cells
        for (let i = 1; i <= daysInMonth; i++) {
            const th = document.createElement('th');
            th.textContent = `${i} ${monthName}`;
            headerContainer.appendChild(th);
        }
    } else {
        console.error('Element with ID "header-container" not found.');
    }
}

function updateTableBody(attendanceData) {
    const tbody = document.querySelector('table tbody');
    if (tbody) {
        tbody.innerHTML = ''; // Clear existing rows

        attendanceData.forEach(student => {
            const tr = document.createElement('tr');
            const idCell = document.createElement('td');
            idCell.textContent = student.id;
            tr.appendChild(idCell);

            const nameCell = document.createElement('td');
            nameCell.textContent = student.name;
            tr.appendChild(nameCell);

            student.attendance.forEach(status => {
                const td = document.createElement('td');

                if (status == 1) {
                    td.innerHTML = '<i class="fa-solid fa-circle-check" style="font-size: 14px; color: green;"></i>'; // Davomat bor
                } else if (status == 2) {
                    td.innerHTML = '<i class="fa-solid fa-circle-xmark" style="font-size: 14px; color: red;"></i>'; // Davomat yo'q
                } else if (status == 3) {
                    td.innerHTML = '<i class="fa-solid fa-circle-question" style="font-size: 14px; color: #b3a349;"></i>'; // Sababli davomat
                } else {
                    td.textContent = '-'; // Agar status aniqlanmagan bo'lsa
                }

                tr.appendChild(td);
            });

            tbody.appendChild(tr);
        });
    } else {
        console.error('Table body element not found.');
    }
}
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
