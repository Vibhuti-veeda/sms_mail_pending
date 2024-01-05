<div>
    <div class="form-group">
        <p>
            <b>
                Below are the list of
            </b> 
            <b style="color: blue;"> 
                Delay 
            </b>
            <b>
                activities, kindly take necessary action.
            </b>
        </p>
    </div>
    @if(!is_null($responsibilityIds))
        @foreach($responsibilityIds as $rbik => $rbiv)
                @if(count($delayActivity[$rbiv]) > 0)
                    <p>
                        <strong>
                            Response Name:
                        </strong> 
                        {{ ((!is_null($delayActivity[$rbiv]->first()->response)) && ($delayActivity[$rbiv]->first()->response->name != '')) ? $delayActivity[$rbiv]->first()->response->name : '---' }}
                    </p>
                    <table style="border-collapse: collapse; border-spacing: 0; width: 85%; border: 1px solid;">
                        <tr>
                            <th style="color: blue;">
                                List of delay activities
                            </th>
                        </tr>
                        <tr style="border: 1px solid;">
                            <center>
                                <th style="border: 1px solid; width: 20px;">Sr.No</th>
                                <th style="border: 1px solid;">Study No</th>
                                <th style="border: 1px solid;">Activity Name</th>
                                <th style="border: 1px solid;">Schedule Start Date</th>
                                <th style="border: 1px solid;">Activity Status</th>
                            </center>
                        </tr>
                        @if(!is_null($delayActivity[$rbiv])) 
                            @foreach($delayActivity[$rbiv] as $dk => $dv)   
                                <center>
                                    <tr style="border: 1px solid;">
                                        <td style="border: 1px solid;">{{ $loop->iteration }}</td>
                                        <td style="border: 1px solid;">
                                            {{ ((!is_null($dv->studyNo)) && ($dv->studyNo->study_no != '')) ? $dv->studyNo->study_no : '---' }}
                                        </td>
                                        <td style="border: 1px solid;">
                                            {{ ($dv->activity_name != '') ? $dv->activity_name : '---' }}
                                        </td>
                                        <td style="border: 1px solid;">
                                            {{ ($dv->scheduled_start_date != '') ? date('d M Y', strtotime($dv->scheduled_start_date)) : '---' }}
                                        </td>
                                        <td style="border: 1px solid;">
                                            {{ ($dv->activity_status != '') ? $dv->activity_status : '---' }}
                                        </td>
                                    </tr>
                                </center>
                            @endforeach
                        @endif       
                    </table>
                    <br>
                    <br>
                @else
                    <table style="border-collapse: collapse; border-spacing: 0; width: 85%; border: 1px solid;">
                        <tr>
                            <th style="color: blue;">
                                No delay activities this week
                            </th>
                        </tr>
                    </table>
                @endif
        @endforeach
    @endif  
</div>