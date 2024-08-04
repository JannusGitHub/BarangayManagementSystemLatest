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
        <h1 class="fw-bold mb-5"><span class="border-end border-secondary border-5 mr-3"></span>History</h1>
        <div id="divHistory" class="mb-5">
            <div class="row">
            </div>
        </div>
        
        <!-- Auto Generated -->
        {{-- <div class="row">
            <h1 class="fw-bold text-md-center">History</h1>
            <h5 class="mt-3">Brief History</h5>
            <p>The Barangay IV has called LOOK of fishermen because it is the inner part of the shore of Laguna Lake. A LOOK Kay was formerly called Notes. According to the first ever lived here, every fall the New Year, there appears to be brilliant record in the rivers. The river has been called to record. Seven families from the town of Cabuyao, Santa Rosa and even in Calamba, the first founder of this area. These are the farmers took a heavy storm on the lake that can not be returned if they are stopped seepage called to IV. They went together and agreed to include their vocational pangigisda and planting vegetables.</p>

            <p>During the Spanish era, the Barangay IV has a forested area, large trees and tall grass the largest part of the land of IV. As such, it has become place of robbers and Roger Filipinos fought against the Spaniards, but the Spaniards burned the forest and some households to not hide from the enemies of the Spaniards. The arson has been called to the HISTORY of IV La Samiento. Again became the refuge during barangay IV American soldiers under General Doc Pacoa. Several men in the organization IV Saksdalista overlap. This group is against the Americans because they want the Japanese to occupy the Philippines. During this time also established the first school in 1933 in this village. The Barangay IV was also nicknamed "Little Tokyo during the Japanese occupation because of the many men who lived here and come join ABSOLUTELY also the national organization or movement Plilipino able to choose.</p>
            
            <p>The Barangay IV is one of the Barangay Calamba on the shore of Laguna Lake. It is a peninsula surrounded by five villages and lakes. Its southern Barangay Sampiruhan: South West Banlic, and the west is Banadero. The Barangay IV has over fifteen kilometers (15) kilimetro away in town. It has a total size of 600 hectares. The Barangay IV has fully become a barangay on the 22nd of June 1963 by virtue of RA 3390. The Barangay IV has called Vegetable Bowl or the Gulayang of Calamba Calamba Bowl. This is due to numerous and unrelenting here yield of vegetables like eggplant, okra, bean, loofah, bitter gourd, seating and other vegetables. Also known as the only place in IV Calamba harvesting watermelons and turnip. The other inhabitants are living by fishing and selling of room to store vegetables, while others were feeding ducks and embracing.</p>
            
            <p>The Barangay IV is more known in the celebration of Nautilus, in conjunction with the dancing procession. This is a pamamanata or gratitude to their patron recognized, Santa Maria Magdalena. The participants here are kababailang wear suit or shirt and skirt. Also includes the tradition known pananapatan Barangay IV. It is held every fall the new year. The youth home tumatapat house where they kinakalampag tin, tub, buckets or anything that may create noise and at the same time cry: Long live the wife! This followed the din of the tin and pampaingay, and as a thanksgiving to the house with nananapatan he will give money.</p>
            
            <p>According to information obtained in the former Captain of Barangay IV named Captain Eduardo Popular. According to its description in the form of former villages, the old road of the buffalo wallow and hence, they are forced to go on the side of the house when rain. The village, the only vehicle ago only road is the carts. So small roads through tinente are asking them to either side lot for the kalsada.Ang loosen its reached that number of houses is 30 only includes the Barangay and Barangay Sampiruhan Uwisan those times are still only Sitio IV Barangay that isolated only in the year 1969 when the population began to multiply. To present a modern and innovative building the naipagawa Barangay Government in the office of Punong Barangay - Hon. Christopher "Boyet" Natividad grandson of the late Hon. Ambrose became the first Prime Geca Barangay IV and he also he makes the first Barangay Hall.</p>
            
            <p>The new building of the Government System of IV that naipatayo leadership and management of Punong Barangay - Hon. Christopher G. Natividad in the past who have 2009 with complete equipment and extensive conference Hall located on the second floor of the building The past studies can help to be the basis of these changes occurred and in presenting information or data previously obtained in the barangay.</p>
            
            <p>The new form of IV Elementary School In 1980, the class of DECS has conducted the first study on Barangay IV. In 1980 estimated the village consists of 3, 248 residents. In that time the people of IV is mostly Tagalog, followed by the Ilocano, Cebuano and Batangueño. We have also Health Center, Catholic Church, Basketball Court and elementary and high school. High literacy rate in the village of that time, 92% have attended.</p>
            
            <p>The River pass Barangay San Juan, San Cristobal River, and River Notes, due to the river, there are two bridges the village. First is the linking bridge in Barangay IV and Barangay San Juan and the second is located in the central part of the neighborhood. And livelihood, many farmers, fishermen and those who take care of ducks. One Barangay IV, which supplies fish tilapia and vegetables such as bean and tomato</p>
        </div> --}}
    </div>
    
</body>
</html>

@include('shared.js_links.js_links')
<script type="text/javascript">
    $(document).ready(function () {
        function getTotalHistory(){
            console.log('getTotalHistory()');
            $.ajax({
                url: "get_total_barangay_history",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(response){
                    
                    let totalBarangayHistoryDetails = response['totalBarangayHistoryDetails'];
                    if(totalBarangayHistoryDetails.length > 0){
                        for (let index = 0; index < totalBarangayHistoryDetails.length; index++) {
                            let barangayHistoryId = totalBarangayHistoryDetails[index].id;
                            let barangayHistoryTitle = totalBarangayHistoryDetails[index].title;
                            let barangayHistoryDetails = totalBarangayHistoryDetails[index].details;

                            let html = "";
                            html +=    '<h5>'+barangayHistoryTitle+'</h5>';
                            var barangayHistorySplittedByEnter = barangayHistoryDetails.split('\n');
                            console.log('Lines found: ' + barangayHistorySplittedByEnter.length);
                            for(var i = 0, l = barangayHistorySplittedByEnter.length; i < l; i++) {
                                console.log('Line ' + (i+1) + ': ' + barangayHistorySplittedByEnter[i]);
                                html +=    '<p>'+barangayHistorySplittedByEnter[i]+'</p>';
                            }
                            $('#divHistory .row').append(html);
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
        getTotalHistory();
    });
</script>