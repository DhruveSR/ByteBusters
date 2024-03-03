<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Prediction </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="predictstyle.css?<?php echo time(); ?>" />
        <link rel="stylesheet" type="text/css" href="indexstyle.css?<?php echo time(); ?>" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid">
                <a class="nav-link" href="../index.php" style="color:coral;">
                    <h1> PREDICTION </h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <form action=" predict.php" method="POST" name="symptoms" onsubmit="return validateform()">
            <div class="checkboxes">
                <span>
                    <i>
                        <input type="checkbox"  name="sym[]" value="itching">itching
                        <input type="checkbox"  name="sym[]" value="skin_rash">skin rash
                        <input type="checkbox"  name="sym[]" value="nodal_skin_eruptions">nodal skin eruptions
                        <input type="checkbox" name="sym[]" value="continuous_sneezing">continuous sneezing 
                        <input type="checkbox"  name="sym[]" value="shivering">shivering
                        <input type="checkbox" name="sym[]" value="ulcers_on_tongue">ulcers on tongue
                        <input type="checkbox" name="sym[]" value="joint pain">joint pain
                        <input type="checkbox" name="sym[]" value="stomach_pain">stomach pain
                        <input type="checkbox" name="sym[]" value="acidity">acidity <br>
                        <input type="checkbox" name="sym[]" value="chills">chills
                        <input type="checkbox" name="sym[]" value="muscle_wasting">muscle wasting
                        <input type="checkbox" name="sym[]" value="vomiting">vomiting
                        <input type="checkbox" name="sym[]" value="burning_micturition"> burning micturition
                        <input type="checkbox" name="sym[]" value="spotting_urination">spotting urination
                        <input type="checkbox" name="sym[]" value="fatigue">fatigue
                        <input type="checkbox" name="sym[]" value="weight_gain">weight gain
                        <input type="checkbox" name="sym[]" value="anxiety">anxiety
                        <input type="checkbox" name="sym[]" value="mood_swings">mood swings <br>
                        <input type="checkbox" name="sym[]" value="cold_hands_and_feet">colds hands and feet
                        <input type="checkbox" name="sym[]" value="weight_loss">weight loss
                        <input type="checkbox" name="sym[]" value="restlessness">restlessness
                        <input type="checkbox" name="sym[]" value="lethargy">lethargy
                        <input type="checkbox" name="sym[]" value="patches_on_throat"> patches in throat
                        <input type="checkbox" name="sym[]" value="irregular_sugar_level"> irregular sugar level
                        <input type="checkbox" name="sym[]" value="cough">cough
                        <input type="checkbox" name="sym[]" value="high_fever">high fever
                        <input type="checkbox" name="sym[]" value="sunken_eyes">sunken eyes <br>
                        <input type="checkbox" name="sym[]" value="breathlessness">breathlessness
                        <input type="checkbox" name="sym[]" value="sweating"> sweating
                        <input type="checkbox" name="sym[]" value="dehydration">dehydration
                        <input type="checkbox" name="sym[]" value="indigestion">indigestion
                        <input type="checkbox" name="sym[]" value="headache"> headache
                        <input type="checkbox" name="sym[]" value="yellowish_skin">yellowish skin
                        <input type="checkbox" name="sym[]" value="dark_urine">dark urine
                        <input type="checkbox" name="sym[]" value="nausea">nausea
                        <input type="checkbox" name="sym[]" value="pain_behind_the_eyes"> pain behind the eyes <br>
                        <input type="checkbox" name="sym[]" value="loss_of_appetite"> loss of appetite
                        <input type="checkbox" name="sym[]" value="back_pain"> back pain
                        <input type="checkbox" name="sym[]" value="constipation">constipation
                        <input type="checkbox" name="sym[]" value="mild_fever">mild fever
                        <input type="checkbox" name="sym[]" value="abdominal_pain">abdominal pain
                        <input type="checkbox" name="sym[]" value="diarrhoea"> diarrhoea
                        <input type="checkbox" name="sym[]" value="yellow_urine">yellow urine
                        <input type="checkbox" name="sym[]" value="yellowing_of_eyes">yellowing of eyes
                        <input type="checkbox" name="sym[]" value="fluid_overload">fluid overload <br>
                        <input type="checkbox" name="sym[]" value="acute_liver_failure">acute liver failure
                        <input type="checkbox" name="sym[]" value="swelling_of_stomach">swelling of stomach
                        <input type="checkbox" name="sym[]"value="acute_liver_failure">acute liver failure
                        <input type="checkbox" name="sym[]"value="yellow_urine">yellow urine
                        <input type="checkbox" name="sym[]"value="yellowing_of_eyes">yellowing of eyes
                        <input type="checkbox" name="sym[]"value="fluid_overload">fluid overload
                        <input type="checkbox" name="sym[]"value="swelled_lymph_nodes">swelled lymph nodes
                        <input type="checkbox" name="sym[]"value="malaise">malaise <br>
                        <input type="checkbox" name="sym[]"value="blurred_and_distorted_vision">blurred and distorted vision
                        <input type="checkbox" name="sym[]"value="phlegm">phlegm
                        <input type="checkbox" name="sym[]"value="throat_irritation">throat irritation
                        <input type="checkbox" name="sym[]"value="redness_of_eyes">redness of eyes
                        <input type="checkbox" name="sym[]"value="sinus_pressure">sinus pressure
                        <input type="checkbox" name="sym[]"value="runny_nose">runny nose
                        <input type="checkbox" name="sym[]"value="congestion">congestion
                        <input type="checkbox" name="sym[]"value="weakness_in_limbs">weakness in limbs <br>
                        <input type="checkbox" name="sym[]"value="chest_pain">chest pain
                        <input type="checkbox" name="sym[]"value="fast_heart_rate">fast heart rate
                        <input type="checkbox" name="sym[]"value="pain_during_bowel_movements">pain during bowel movements
                        <input type="checkbox" name="sym[]"value="pain_in_anal region">pain in anal region
                        <input type="checkbox" name="sym[]"value="bloody_stool">bloody stool
                        <input type="checkbox" name="sym[]"value="irritation_in_anus">irritation in anus
                        <input type="checkbox" name="sym[]"value="neck_pain">neck pain
                        <input type="checkbox" name="sym[]"value="dizziness">dizziness <br>
                        <input type="checkbox" name="sym[]"value="cramps">cramps
                        <input type="checkbox" name="sym[]"value="bruising">bruising
                        <input type="checkbox" name="sym[]"value="obesity">obesity
                        <input type="checkbox" name="sym[]"value="swollen_legs">swollen legs
                        <input type="checkbox" name="sym[]"value="swollen_blood_vessels">swollen blood vessels
                        <input type="checkbox" name="sym[]"value="puffy_face_and_eyes">puffy face and eyes
                        <input type="checkbox" name="sym[]"value="enlarged_thyroid">enlarged thyroid
                        <input type="checkbox" name="sym[]"value="brittle_nails">brittle nails
                        <input type="checkbox" name="sym[]"value="swollen_extremeties">swollen extremeties <br>
                        <input type="checkbox" name="sym[]"value="excessive_hunger">excessive hunger
                        <input type="checkbox" name="sym[]"value="extra_marital_contacts">extra marital contacts
                        <input type="checkbox" name="sym[]"value="drying_and_tingling lips">drying and tingling lips
                        <input type="checkbox" name="sym[]"value="slurred_speech">slurred speech
                        <input type="checkbox" name="sym[]"value="knee_pain">knee pain
                        <input type="checkbox" name="sym[]"value="hip_joint_pain">hip joint pain
                        <input type="checkbox" name="sym[]"value="muscle_weakness">muscle weakness
                        <input type="checkbox" name="sym[]"value="stiff_neck">stiff neck <br>
                        <input type="checkbox" name="sym[]"value="swelling_joints">swelling joints
                        <input type="checkbox" name="sym[]"value="movement_stiffness">muscle weakness
                        <input type="checkbox" name="sym[]"value="movement_stiffness">movement stiffness
                        <input type="checkbox" name="sym[]"value="spinning_movements">spinning movements
                        <input type="checkbox" name="sym[]"value="loss_of_balance">loss of balance
                        <input type="checkbox" name="sym[]"value="unsteadiness">unsteadiness
                        <input type="checkbox" name="sym[]"value="weakness_of_one_body_side">weakness of one body side <br>
                        <input type="checkbox" name="sym[]"value="loss_of_smell">loss of smell
                        <input type="checkbox" name="sym[]"value="bladder_discomfort">bladder discomfort
                        <input type="checkbox" name="sym[]"value="foul_smell_of urine">foul smell of urine
                        <input type="checkbox" name="sym[]"value="continuous_feel_of_urine">continuous feel of urine
                        <input type="checkbox" name="sym[]"value="passage_of_gases">passage of gases
                        <input type="checkbox" name="sym[]"value="internal_itching">internal itching
                        <input type="checkbox" name="sym[]"value="toxic_look_(typhos)">typhos
                        <input type="checkbox" name="sym[]"value="depression">depression <br>
                        <input type="checkbox" name="sym[]"value="irritability">irritability
                        <input type="checkbox" name="sym[]"value="muscle_pain">muscle pain
                        <input type="checkbox" name="sym[]"value="altered_sensorium">altered sensorium
                        <input type="checkbox" name="sym[]"value="red_spots_over_body">red spots over body
                        <input type="checkbox" name="sym[]"value="belly_pain">belly pain
                        <input type="checkbox" name="sym[]"value="abnormal_menstruation">abnormal menstruation
                        <input type="checkbox" name="sym[]"value="dischromic_patches">dischromic patches
                        <input type="checkbox" name="sym[]"value="polyuria">polyuria <br>
                        <input type="checkbox" name="sym[]"value="watering_from_eyes">watering from eyes
                        <input type="checkbox" name="sym[]"value="increased_appetite">increased appetite
                        <input type="checkbox" name="sym[]"value="family_history">family history
                        <input type="checkbox" name="sym[]"value="mucoid_sputum">mucoid sputum
                        <input type="checkbox" name="sym[]"value="rusty_sputum">rusty sputum
                        <input type="checkbox" name="sym[]"value="lack_of_concentration">lack of concentration
                        <input type="checkbox" name="sym[]"value="visual_disturbances">visual disturbances
                        <input type="checkbox" name="sym[]"value="coma">coma <br>
                        <input type="checkbox" name="sym[]"value="receiving_blood_transfusion">receiving blood transfusion
                        <input type="checkbox" name="sym[]"value="receiving_unsterile_injections">receiving unsterile injections
                        <input type="checkbox" name="sym[]"value="stomach_bleeding">stomach bleeding
                        <input type="checkbox" name="sym[]"value="distention_of_abdomen">distention of abdomen
                        <input type="checkbox" name="sym[]"value="history_of_alcohol_consumption">history of alcohol consumption
                        <input type="checkbox" name="sym[]"value="fluid_overload">fluid overload <br>
                        <input type="checkbox" name="sym[]"value="blood_in_sputum">blood in sputum
                        <input type="checkbox" name="sym[]"value="prominent_veins_on_calf">prominent veins on calf
                        <input type="checkbox" name="sym[]"value="palpitations">palpitations
                        <input type="checkbox" name="sym[]"value="painful_walking">painful walking
                        <input type="checkbox" name="sym[]"value="pus_filled_pimples">pus filled pimples
                        <input type="checkbox" name="sym[]"value="blackheads">blackheads
                        <input type="checkbox" name="sym[]"value="scurring">scurring
                        <input type="checkbox" name="sym[]"value="skin_peeling">skin peeling <br>
                        <input type="checkbox" name="sym[]"value="silver_like_dusting">silver like dusting
                        <input type="checkbox" name="sym[]"value="small_dents_in_nails">small dents in nails
                        <input type="checkbox" name="sym[]"value="inflammatory_nails">inflammatory nails
                        <input type="checkbox" name="sym[]"value="blister">blister
                        <input type="checkbox" name="sym[]"value="red_sore_around_nose">red sore around nose
                        <input type="checkbox" name="sym[]"value="yellow_crust_ooze">yellow crust ooze <br><br><br>
                    </i>
                </span>
            <input type="submit" name="submit" value="predict"><br><br>
        </form>
        <script>
            function validateform(){
                var checkboxes = document.getElementsByName("sym[]");
                var ischecked = false;
                for (var i =0; i < checkboxes.length; i++){
                    if (checkboxes[i].checked){
                        ischecked = true;
                        break;
                    }
                }
                if (!ischecked){
                    alert("Please choose at least one symptom.")
                    return false;
                }
                return true;
            }
        </script>
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
            if (isset($_POST['submit'])){
                $symptoms=$_POST['sym'];
                $array_string = implode(",", $symptoms);
                $command = escapeshellcmd('python predict.py '.$array_string);
                $output = shell_exec($command);
                echo $output;
            }
        ?></h5>
    </body>
</html>