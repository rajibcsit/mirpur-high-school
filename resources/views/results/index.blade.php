@extends('layouts.app') @section('title','Student Result Portal') @section('content')
<section class="bg-gradient-to-br from-[#072e1c] to-primary text-white py-20"><div class="max-w-6xl mx-auto px-4 text-center"><span class="hero-kicker">ACADEMIC PORTAL</span><h1 class="text-5xl md:text-6xl font-black mt-5">Student Result Portal</h1><p class="text-white/70 text-lg mt-4">Securely check examination performance anytime, anywhere.</p></div></section>
<section class="max-w-6xl mx-auto px-4 -mt-10 relative z-10"><div class="bg-white rounded-3xl shadow-xl border p-6 md:p-8"><form method="GET" class="grid md:grid-cols-2 lg:grid-cols-5 gap-4"><div><label class="form-label">Student ID</label><input name="student_id" value="{{ request('student_id') }}" required class="form-input" placeholder="MHS-1001"></div><div><label class="form-label">Roll No</label><input name="roll_no" value="{{ request('roll_no') }}" required class="form-input"></div><div><label class="form-label">Academic Year</label><input type="number" name="academic_year" value="{{ request('academic_year',now()->year) }}" required class="form-input"></div><div><label class="form-label">Examination</label><input name="exam_name" value="{{ request('exam_name','Annual Examination') }}" required class="form-input"></div><div class="flex items-end"><button class="w-full bg-primary text-white px-5 py-3 rounded-xl font-bold">Search Result</button></div></form></div></section>
<section class="max-w-6xl mx-auto px-4 py-14"><style>.form-label{display:block;font-size:.78rem;font-weight:800;color:#374151;margin-bottom:.45rem}.form-input{width:100%;border:1px solid #d1d5db;border-radius:.8rem;padding:.75rem .85rem;background:white}.form-input:focus{outline:none;border-color:#0f5132;box-shadow:0 0 0 3px #0f51321a}.result-print{display:none}@media print{body *{visibility:hidden}.result-print,.result-print *{visibility:visible}.result-print{display:block;position:absolute;left:0;top:0;width:100%;background:#fff}.result-print table{page-break-inside:auto}.result-print tr{page-break-inside:avoid;page-break-after:auto}}
</style>@if($error)<div class="bg-red-50 border border-red-200 text-red-700 rounded-2xl p-5 mb-8">{{ $error }}</div>@endif @if($student && $results->count())
<div class="result-print">
    <div style="font-family:Arial,sans-serif;padding:30px;color:#111;">
        <div style="text-align:center;border-bottom:2px solid #111;padding-bottom:14px;margin-bottom:20px;">
            <h1 style="font-size:24px;font-weight:800;margin:0;">{{ $schoolSettings->school_name ?? $schoolSettings->name ?? 'Mirpur ML High School' }}</h1>
            @if(!empty($schoolSettings->address))
                <p style="margin:5px 0;font-size:13px;">{{ $schoolSettings->address }}</p>
            @endif
            <h2 style="font-size:19px;margin:12px 0 0;">{{ request('exam_name') }} — Student Result</h2>
        </div>

        <table style="width:100%;border-collapse:collapse;margin-bottom:20px;font-size:13px;">
            <tr>
                <td style="padding:7px;border:1px solid #ccc;"><strong>Student Name:</strong> {{ $student->name }}</td>
                <td style="padding:7px;border:1px solid #ccc;"><strong>Student ID:</strong> {{ $student->student_id }}</td>
            </tr>
            <tr>
                <td style="padding:7px;border:1px solid #ccc;"><strong>Roll No:</strong> {{ $student->roll_no }}</td>
                <td style="padding:7px;border:1px solid #ccc;"><strong>Academic Year:</strong> {{ $student->academic_year }}</td>
            </tr>
            <tr>
                <td style="padding:7px;border:1px solid #ccc;"><strong>Class:</strong> {{ $student->class_name }}{{ $student->section ? ' / '.$student->section : '' }}</td>
                <td style="padding:7px;border:1px solid #ccc;"><strong>Registration:</strong> {{ $student->registration_no ?? 'N/A' }}</td>
            </tr>
        </table>

        <table style="width:100%;border-collapse:collapse;font-size:12px;">
            <thead>
                <tr>
                    <th style="border:1px solid #999;padding:8px;text-align:left;">Subject</th>
                    <th style="border:1px solid #999;padding:8px;">Full Marks</th>
                    <th style="border:1px solid #999;padding:8px;">Pass</th>
                    <th style="border:1px solid #999;padding:8px;">Marks</th>
                    <th style="border:1px solid #999;padding:8px;">Grade</th>
                    <th style="border:1px solid #999;padding:8px;">Point</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $r)
                    <tr>
                        <td style="border:1px solid #999;padding:8px;">{{ $r->subject }}{{ $r->subject_code ? ' ('.$r->subject_code.')' : '' }}</td>
                        <td style="border:1px solid #999;padding:8px;text-align:center;">{{ $r->full_marks }}</td>
                        <td style="border:1px solid #999;padding:8px;text-align:center;">{{ $r->pass_marks }}</td>
                        <td style="border:1px solid #999;padding:8px;text-align:center;font-weight:700;">{{ $r->marks }}</td>
                        <td style="border:1px solid #999;padding:8px;text-align:center;">{{ $r->grade ?: $r->calculated_grade }}</td>
                        <td style="border:1px solid #999;padding:8px;text-align:center;">{{ $r->grade_point !== null ? number_format((float)$r->grade_point, 2) : number_format((float)$r->calculated_grade, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table style="width:100%;border-collapse:collapse;margin-top:20px;font-size:13px;">
            <tr>
                <td style="border:1px solid #ccc;padding:8px;"><strong>Total Subjects:</strong> {{ $summary['total'] }}</td>
                <td style="border:1px solid #ccc;padding:8px;"><strong>Total Marks:</strong> {{ $summary['obtained'] }} / {{ $summary['full'] }}</td>
                <td style="border:1px solid #ccc;padding:8px;"><strong>Percentage:</strong> {{ $summary['percentage'] }}%</td>
                <td style="border:1px solid #ccc;padding:8px;"><strong>GPA:</strong> {{ number_format($summary['gpa'], 2) }}</td>
            </tr>
        </table>

        <div style="margin-top:45px;display:flex;justify-content:space-between;font-size:12px;">
            <span>Printed: {{ now()->format('d M Y, h:i A') }}</span>
            <span>Authorized Signature __________________</span>
        </div>
    </div>
</div><div id="result-card" class="bg-white rounded-3xl border shadow-sm overflow-hidden"><div class="p-7 md:p-9 bg-gradient-to-r from-primary to-[#176c45] text-white flex flex-col md:flex-row justify-between gap-5"><div><p class="text-white/60 text-xs uppercase tracking-widest">{{ request('exam_name') }} · {{ $student->academic_year }}</p><h2 class="text-3xl font-black mt-2">{{ $student->name }}</h2><p class="text-white/70 mt-2">ID: {{ $student->student_id }} · Roll: {{ $student->roll_no }} · Class: {{ $student->class_name }} {{ $student->section?'('.$student->section.')':'' }}</p></div><button onclick="window.print()" class="self-start border border-white/30 px-4 py-2 rounded-xl font-bold">Print Result</button></div><div class="grid grid-cols-2 md:grid-cols-4 border-b">@foreach([['Subjects',$summary['total']],['Marks',$summary['obtained'].' / '.$summary['full']],['Percentage',$summary['percentage'].'%'],['GPA',number_format($summary['gpa'],2)]] as $x)<div class="p-6 text-center border-r last:border-0"><div class="text-2xl font-black text-primary">{{ $x[1] }}</div><div class="text-xs uppercase tracking-widest text-gray-400 mt-1">{{ $x[0] }}</div></div>@endforeach</div><div class="overflow-x-auto"><table class="w-full text-sm"><thead class="bg-gray-50"><tr><th class="text-left p-5">Subject</th><th class="p-5">Full Marks</th><th class="p-5">Pass</th><th class="p-5">Marks</th><th class="p-5">Grade</th><th class="p-5">Point</th></tr></thead><tbody>@foreach($results as $r)<tr class="border-t"><td class="p-5 font-bold">{{ $r->subject }} @if($r->subject_code)<small class="text-gray-400">({{ $r->subject_code }})</small>@endif</td><td class="p-5 text-center">{{ $r->full_marks }}</td><td class="p-5 text-center">{{ $r->pass_marks }}</td><td class="p-5 text-center font-black">{{ $r->marks }}</td><td class="p-5 text-center"><span class="px-3 py-1 rounded-full bg-primary/10 text-primary font-bold">{{ $r->grade }}</span></td><td class="p-5 text-center">{{ number_format((float)$r->grade_point,2) }}</td></tr>@endforeach</tbody></table></div></div>@endif</section>@endsection
