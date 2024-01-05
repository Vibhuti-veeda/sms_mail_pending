<div style="border: 2px solid;">
    <h3 class="mt-2" style="margin-left: 10px;">
        <b>
            Study
        </b>
    </h3>
    <div class="col-xl-12">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.departmentScheduleTrackingList') }}?ref=COMPLETED" title="Started on time, completed on time">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">
                                        Completed
                                    </p>
                                    <h4 class="mb-0">{{ $totalCompletedStudy }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-archive-in font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.departmentScheduleTrackingList') }}?ref=ONGOING" title="Started on time, but not completed">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">
                                        Ongoing
                                    </p>
                                    <h4 class="mb-0">{{ $totalOngoingStudy }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.departmentScheduleTrackingList') }}?ref=UPCOMING" title="Upcoming">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">
                                        Upcoming
                                    </p>
                                    <h4 class="mb-0">{{ $totalUpcomingStudy }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>&nbsp;
<div style="border: 2px solid;">
    <h3 class="mt-2" style="margin-left: 10px;">
        <b>
            Post Activity
        </b>
    </h3>
    <div class="col-xl-12">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('admin.departmentActivityTrackingList') }}?refStatus=COMPLETED" title="Started on time, completed on time">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">
                                        Completed
                                    </p>
                                    <h4 class="mb-0">{{ $totalCompleted }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.departmentActivityTrackingList') }}?refStatus=ONGOING" title="Started on time, but not completed">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">
                                        Ongoing
                                    </p>
                                    <h4 class="mb-0">{{ $totalOngoing }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.departmentActivityTrackingList') }}?refStatus=UPCOMING" title="Upcoming">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">
                                        Upcoming
                                    </p>
                                    <h4 class="mb-0">{{ $totalUpcoming }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.departmentActivityTrackingList') }}?refStatus=DELAY" title="Not started as per scheduled start date">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">
                                        Delay
                                    </p>
                                    <h4 class="mb-0">{{ $totalDelay }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
