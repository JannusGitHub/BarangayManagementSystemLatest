<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barangay Management System</title>
    @include('shared.css_links.css_links')

</head>
<body>
    @include('shared.pages.index_nav')

    <div class="container" style="margin-top: 7rem">
        <div class="row">
            <h1 class="fw-bold mb-5"><span class="border-end border-secondary border-5 mr-3"></span>Mission & Vision</h1>
            <h5 class="mt-3">Mission</h5>
            <div id="divMission" class="mb-5">
                <div class="row">
                </div>
            </div>
            <h5 class="mt-3">Vision</h5>
            <div id="divVision" class="mb-5">
                <div class="row">
                </div>
            </div>
            
            <!-- Auto Generated -->
            {{-- <h5 class="mt-3">Vision</h5>
            <p>Become a leading Barangay Calamba City in the field of Public Service, Program on Environment and Protecting it, Pangpalakasan Games Culture and Education, Infrastructure and Kaularan, public peace, love for God and Country To be the leading Barangay in the Municipality of Calamba in terms of Public Service, Environment Protection and Programs, Education, Culture and Sports, Infrastructures and Development, Public Peace and Order, Love of God and Country. </p>

            <h5 class="mt-3">Mission</h5>
            <p>To achieve the magi to, We the Officers and Barangay IV Staff should: Provide a quality and friendly service with no humane approaches favored and paguuri. Charge an environmental intervention gaming enforcement of existing law, Resolution. Ordinance and Program. Raise the level of awareness of our citizens in the Games, Education, Ability and being matangkilik and nationalist. Make estratihiyang planning through effective and efficient decision-making. Maintain peace and order in accordance with the Law and respect for human rights. Isauna God in our consciousness and the Acts and fight corruption and remove according to our abilities.</p>

            <p>To achieve this, We Barangay Officials and Employees of Barangay IV Shall:
            
            Provide services in Quality and Friendly compassionate impartiality and nice with no discrimination.
            
            Someone that protect environment through implementation of existing laws, resolutions, ordinances and programs, Increase our level of competency someone that citizens in sports, education, skills, patriotism and Nationalism.
            
            Make strategic planning through effective and efficient decision making for the set development program. Maintain Public Peace and Order in accordance with law and respect in human rights.
            
            Put God first in someone that Deeds and actions and fight graft and corruptions and eliminated in someone that own capacity.</p> --}}
        </div>
    </div>
</body>
</html>

@include('shared.js_links.js_links')
<script type="text/javascript">
    $(document).ready(function () {
        function getTotalMissionVision(){
            console.log('getTotalMissionVision()');
            $.ajax({
                url: "get_total_barangay_mission_vision",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(response){
                    
                    let totalBarangayMissionVisionDetails = response['totalBarangayMissionVisionDetails'];
                    if(totalBarangayMissionVisionDetails.length > 0){
                        for (let index = 0; index < totalBarangayMissionVisionDetails.length; index++) {
                            let barangayMissionVisionId = totalBarangayMissionVisionDetails[index].id;
                            let barangayMission = totalBarangayMissionVisionDetails[index].mission;
                            let barangayVision = totalBarangayMissionVisionDetails[index].vision;

                            let htmlForMission = "";
                            let htmlForVision = "";
                            var barangayMissionSplittedByEnter = barangayMission.split('\n');
                            console.log('Lines found: ' + barangayMissionSplittedByEnter.length);
                            for(var i = 0; i < barangayMissionSplittedByEnter.length; i++) {
                                console.log('Line ' + (i+1) + ': ' + barangayMissionSplittedByEnter[i]);
                                htmlForMission +=    '<p>'+barangayMissionSplittedByEnter[i]+'</p>';
                            }

                            var barangayVisionSplittedByEnter = barangayVision.split('\n');
                            console.log('Lines found: ' + barangayVisionSplittedByEnter.length);
                            for(var i = 0; i < barangayVisionSplittedByEnter.length; i++) {
                                console.log('Line ' + (i+1) + ': ' + barangayVisionSplittedByEnter[i]);
                                htmlForVision +=    '<p>'+barangayVisionSplittedByEnter[i]+'</p>';
                            }
                            $('#divMission .row').append(htmlForMission);
                            $('#divVision .row').append(htmlForVision);
                        }
                    }
                    // else{
                    //     toastr.warning('No Announcement records found!');
                    // }
                },
                error: function(data, xhr, status){
                    toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                },
            });
        }
        getTotalMissionVision();
    });
</script>