<script>
    $(function() {
        $('#dm')
            .hide();
    });
    $(document).ready(function() {
        $("#applydg").click(function() {
            $("#dm").toggle();
        });
    });

    $(document).ready(function() {
        $('.collapse').on('show.bs.collapse', function() {
            // hide all accordion except the clicked one
            $('.collapse').not(this).collapse('hide');
        });
    });
</script>
<div class="table-responsive">

    <table class="table table-striped table-bordered table-hover career-page">
        <thead>
            <tr class="maintr">
                <th><span class="p-1">Vacancy For</span></th>
                <th><span class="p-1">Work Experience</span></th>
                <th><span class="p-1">Number Of Positions</span></th>
                <th><span class="p-1">Apply Now</span></th>
            </tr>
        </thead>
        <tbody class="career-page-css">
            @forelse ($jobs as $row)
                <tr>
                    <td scope="row">{{ $row['title'] }}</td>
                    <td>{{$row['experience']}}</td>
                    <td>{{$row['num_of_post']}}</td>
                    <td class="apply-btn-career-page"><button data-bs-toggle="collapse"
                            data-bs-target="#vacancy_dme_{{$row['id']}}" aria-expanded="false"
                            aria-controls="vacancy_dme" data-parent="#vacancy">Apply Now</button></td>
                </tr>
                <tr class="collapse" id="vacancy_dme_{{$row['id']}}" data-parent="#accordion">
                    <td colspan="4">
                        <table class="table table-bordered ">
                            <tbody>
                                <tr>
                                    <th scope="col" class="w-50 bg-light"><strong>Location</strong></th>
                                    <td scope="col" class="w-50">{{$row['location']}}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-light"><strong>Qualification</strong></th>
                                    <td scope="col">{{$row['qualification']}}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-light"><strong>Work Experience</strong></th>
                                    <td scope="col">{{$row['experience']}}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-light"><strong>Salary</strong></th>
                                    <td scope="col">Best in the Industry</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-light"><strong>Required Skills/Experience</strong></th>
                                    <td scope="col">{{$row['skills']}}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-light"><strong>Job Profile</strong></th>
                                    <td scope="col">{{$row['job_profile']}}</td>
                                </tr>
                                <tr>
                                    <td scope="col" colspan="2"><a href="/career_form/{{$row['id']}}"
                                            class="btn btn-success" target="_blank">Apply Now</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">{{ 'No Jobs Posted.' }}</td>
                </tr>
            @endforelse

        </tbody>

    </table>

</div>
