@extends('layouts.admin')
@section('title','Department Activity Tracking')
@section('content')

<div class="page-content">
    <div class="container-fluid">

       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Department Activity Tracking</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Department Activity Tracking</li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="accordion" id="accordionExample">
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#studyCollapseFilter" aria-expanded="true" aria-controls="studyCollapseFilter">
                        Filters
                    </button>
                </h2>
                <div id="studyCollapseFilter" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <form method="post" action="{{ route('admin.departmentActivityTrackingList') }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-2">
                                    <label class="control-label">Project Managers</label>
                                    <select class="form-control select2" name="project_manager" style="width: 100%;">
                                        <option value="">Select Project Managers</option>
                                        @if(!is_null($projectManagers))
                                            @foreach($projectManagers as $pk => $pv)
                                                <option @if($projectManagerName == $pv->id) selected @endif value="{{ $pv->id }}">
                                                    {{ $pv->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                
                                <div class="col-md-2">
                                    <label class="control-label">Study No</label>
                                    <select class="form-control select2" name="study_name" style="width: 100%;">
                                        <option value="">Select Study No</option>
                                        @if(!is_null($studies))
                                            @foreach($studies as $sk => $sv)
                                                <option @if($studyName == $sv->id) selected @endif value="{{ $sv->id }}">
                                                    {{ $sv->study_no }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                
                                <div class="col-md-2">
                                    <label class="control-label">Activity Name</label>
                                    <select class="form-control select2" multiple name="activity_id[]" style="width: 100%;">
                                        <option value="">Select Activity Name</option>
                                        @if(!is_null($activities))
                                            @foreach($activities as $ak => $av)
                                                <option @if(in_array($av->id, $activityName)) selected @endif value="{{ $av->id }}">
                                                    {{ $av->activity_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label class="control-label">Sponsor Name</label>
                                    <select class="form-control select2" name="sponsor_id" style="width: 100%;">
                                        <option value="">Select Sponsor Name</option>
                                        @if(!is_null($sponsors))
                                            @foreach($sponsors as $sk => $sv)
                                                <option @if($sponsorName == $sv->id) selected @endif value="{{ $sv->id }}">
                                                    {{ $sv->sponsor_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label class="control-label">Activity Status</label>
                                    <select class="form-control select2" name="activity_status" style="width: 100%;">
                                        <option value="">Select Activity Status</option>
                                        @if(!is_null($activityStatusMaster))
                                            @foreach($activityStatusMaster as $ak => $av)
                                                <option @if($activityStatusName == $av->activity_status_code || $status == $av->activity_status_code) selected @endif value="{{ $av->activity_status_code }}">
                                                    {{ $av->activity_status }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label class="control-label">CR Location</label>
                                    <select class="form-control select2" name="cr_location" style="width: 100%;">
                                        <option value="">Select CR Location</option>
                                        @if(!is_null($crLocation))
                                            @foreach($crLocation as $ck => $cv)
                                                <option @if($crLocationName == $cv->id) selected @endif value="{{ $cv->id }}">
                                                    {{ $cv->location_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label class="control-label">BR Location</label>
                                    <select class="form-control select2" name="br_location" style="width: 100%;">
                                        <option value="">Select BR Location</option>
                                        @if(!is_null($brLocation))
                                            @foreach($brLocation as $bk => $bv)
                                                <option @if($brLocationName == $bv->id) selected @endif value="{{ $bv->id }}">
                                                    {{ $bv->location_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <div class="form-group">
                                        <label>Schedule Start Date Range</label>
                                        <div>
                                            <div class="input-daterange input-group" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-provide="datepickerStyle" autocomplete="off">
                                                <input type="text" class="form-control datepickerStyle" name="start_date" value="{{ $startDate }}" autocomplete="off" placeholder="From Date">
                                                <input type="text" class="form-control datepickerStyle" name="end_date" value="{{ $endDate }}" autocomplete="off" placeholder="To Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <div class="form-group">
                                        <label>Schedule End Date Range</label>
                                        <div>
                                            <div class="input-daterange input-group" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-provide="datepickerStyle" autocomplete="off">
                                                <input type="text" class="form-control datepickerStyle" name="schedule_start_date" value="{{ $scheduleStartDate }}" autocomplete="off" placeholder="From Date">
                                                <input type="text" class="form-control datepickerStyle" name="schedule_end_date" value="{{ $scheduleEndDate }}" autocomplete="off" placeholder="To Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <div class="form-group">
                                        <label>Actual Start Date</label>
                                        <div>
                                            <div class="input-daterange input-group" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-provide="datepickerStyle" autocomplete="off">
                                                <input type="text" class="form-control datepickerStyle" name="actual_start_date" value="{{ $actualStartDate }}" autocomplete="off" placeholder="From Date">
                                                <input type="text" class="form-control datepickerStyle" name="actual_end_date" value="{{ $actualEndDate }}" autocomplete="off" placeholder="To Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <div class="form-group ">
                                        <label>Actual End Date</label>
                                        <div>
                                            <div class="input-daterange input-group" data-date-format="dd/mm/yyyy"data-date-autoclose="true" data-provide="datepickerStyle" autocomplete="off">
                                                <input type="text" class="form-control datepickerStyle" name="actual_end_start_date" value="{{ $actualEndStartDate }}" autocomplete="off" placeholder="From Date">
                                                <input type="text" class="form-control datepickerStyle" name="actual_end_end_date" value="{{ $actualEndEndDate }}" autocomplete="off" placeholder="To Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label class="control-label">Study Sub Type</label>
                                    <select class="form-control select2" name="study_sub_type" style="width: 100%;">
                                        <option value="">Select Study Sub Type</option>
                                        @if(!is_null($studySubTypes))
                                            @foreach($studySubTypes as $sstk => $sstv)
                                                <option @if($studySubType == $sstv->id) selected @endif value="{{ $sstv->id }}">
                                                    {{ $sstv->para_value }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                
                                <div class="col-md-1 mt-4">
                                    <button type="submit" class="btn btn-primary vendors save_button mt-4">Submit</button>
                                </div>
                                @if(isset($filter) && ($filter == 1))
                                    <div class="col-md-1 mt-4">
                                        <a href="{{ route('admin.departmentActivityTrackingList') }}" class="btn btn-danger mt-4 cancel_button" id="filter" name="save_and_list" value="save_and_list" style="margin-left:-10px !important;">
                                            Reset
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-activitylist" class="table table-striped table-bordered nowrap datatable-search" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Study No</th>
                                    <th>Activity Name</th>
                                    <th>Schedule Start Date</th>
                                    <th>Actual Start Date</th>
                                    @if(Auth::guard('admin')->user()->role_id == 14 || Auth::guard('admin')->user()->role_id == 1)
                                        <th>Actual Start Date(Filled)</th>
                                    @endif
                                    <th>Schedule End Date</th>
                                    <th>Actual End Date</th>
                                    @if(Auth::guard('admin')->user()->role_id == 14 || Auth::guard('admin')->user()->role_id == 1)
                                        <th>Actual End Date(Filled)</th>
                                    @endif
                                    <th>Activity Status</th>
                                    <!-- <th>Group No</th>
                                    <th>Period No</th> -->
                                    <th>Start Remark</th>
                                    <th>End Remark</th>
                                    <th>Project Manager</th>
                                    <th>Sponsor Name</th>
                                    <th>CR Location</th>
                                    <th>BR Location</th>
                                    <th>Study Type</th>
                                    <th>Regulatory</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!is_null($depActivityTrackingList))
                                    @foreach($depActivityTrackingList as $datk => $datv)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            
                                            <td>
                                                <a id="myModal" data-id="{{ $datv->study_id }}" data-toggle="modal" data-target="#openScheduleDelayModal" href="Javascript:void(0)">
                                                    {{ ((!is_null($datv->studyNo)) && ($datv->studyNo->study_no != '')) ? $datv->studyNo->study_no : '---' }}
                                                </a> 
                                            </td>
                                            <td>
                                                {{ $datv->activity_name }} @if($datv->group_no != 1)(G{{ $datv->group_no }}) @endif @if(($datv->group_no != 1) && ($datv->period_no != 1)) - @endif @if($datv->period_no != 1) (P{{ $datv->period_no }}) @endif @if($datv->activity_version_type != '') ({{ $datv->activity_version_type }}-{{ $datv->activity_version }}) @endif
                                            </td>

                                            <td>
                                                {{ $datv->scheduled_start_date != '' ? date('d M Y', strtotime($datv->scheduled_start_date)) : '---' }}
                                            </td>
                                            <td>
                                                {{ $datv->actual_start_date != '' ? date('d M Y', strtotime($datv->actual_start_date)) : '---' }}
                                            </td>
                                            @if(Auth::guard('admin')->user()->role_id == 14 || Auth::guard('admin')->user()->role_id == 1)
                                                <td>
                                                    {{ $datv->actual_start_date_time != '' ? date('d M Y H:i:s', strtotime($datv->actual_start_date_time)) : '---' }}
                                                </td>
                                            @endif
                                            <td>
                                                {{ $datv->scheduled_end_date != '' ? date('d M Y', strtotime($datv->scheduled_end_date)) : '---' }}
                                            </td>
                                            <td>
                                                {{ $datv->actual_end_date != '' ? date('d M Y', strtotime($datv->actual_end_date)) : '---' }}
                                            </td>
                                            @if(Auth::guard('admin')->user()->role_id == 14 || Auth::guard('admin')->user()->role_id == 1)
                                                <td>
                                                    {{ $datv->actual_end_date_time != '' ? date('d M Y H:i:s', strtotime($datv->actual_end_date_time)) : '---' }}
                                                </td>
                                            @endif
                                            <td>
                                                {{ ((!is_null($datv->activityName)) && ($datv->activityName->activity_status != '')) ? $datv->activityName->activity_status : '---' }}
                                            </td>
                                            <td>
                                                @if(($datv->start_delay_reason_id == '') && ($datv->start_delay_remark != ''))
                                                    Other - {{ $datv->start_delay_remark }}
                                                @elseif(((!is_null($datv->startDelayReason)) && ($datv->startDelayReason->start_delay_remark != '')))
                                                    {{ $datv->startDelayReason->start_delay_remark }}
                                                @elseif($datv->start_delay_remark != '')
                                                    {{ $datv->start_delay_remark }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if(($datv->end_delay_reason_id == '') && ($datv->end_delay_remark != ''))
                                                    Other - {{ $datv->end_delay_remark }}
                                                @elseif(((!is_null($datv->endDelayReason)) && ($datv->endDelayReason->end_delay_remark != '')))
                                                    {{ $datv->endDelayReason->end_delay_remark }}
                                                @elseif($datv->end_delay_remark != '')
                                                    {{ $datv->end_delay_remark }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                {{ ((!is_null($datv->studyNo)) && (!is_null($datv->studyNo->projectManager)) && ($datv->studyNo->projectManager->name != '')) ? $datv->studyNo->projectManager->name : '---' }}
                                            </td>
                                            <td>
                                                {{ ((!is_null($datv->studyNo)) && (!is_null($datv->studyNo->sponsorName)) && ($datv->studyNo->sponsorName->sponsor_name != '')) ? $datv->studyNo->sponsorName->sponsor_name : '---' }}
                                            </td>
                                            <td>
                                                {{ ((!is_null($datv->studyNo)) && (!is_null($datv->studyNo->crLocationName)) && ($datv->studyNo->crLocationName->location_name != '')) ? $datv->studyNo->crLocationName->location_name : '---' }}
                                            </td>
                                            <td>
                                                {{ ((!is_null($datv->studyNo)) && (!is_null($datv->studyNo->brLocationName)) && ($datv->studyNo->brLocationName->location_name != '')) ? $datv->studyNo->brLocationName->location_name : '---' }}
                                            </td>
                                            <td>
                                                {{ ((!is_null($datv->studyNo)) && (!is_null($datv->studyNo->studyType)) && ($datv->studyNo->studyType->para_value != '')) ? $datv->studyNo->studyType->para_value : '-' }}
                                            </td>
                                            <td>
                                                @if((!is_null($datv->studyNo)) && (!is_null($datv->studyNo->studyRegulatories)) && (!is_null($datv->studyNo->studyRegulatories->regulatorySubmission)))
                                                    @php $regulatory = []; @endphp
                                                    @foreach($datv->studyNo->studyRegulatories->regulatorySubmission as $rk => $rv)
                                                        @php 
                                                            $regulatory[] = $rv->para_value;
                                                        @endphp
                                                    @endforeach
                                                    <p>{{ implode(' | ', $regulatory) }}</p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection