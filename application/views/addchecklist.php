<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Checklist</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    </style>
</head>

<body>
    <div class="container">
        <h3>Add Checklists Page</h3>
        <div class="row">
        <form method="post" class="background" action="<?php echo base_url(isset($all_list['id']) ? 'Checklists/update_checklist' : 'Checklists/save_checklist') ?>">
                <div class="col-md-8">
                    <label for="checklist_name">Name of the Checklist/Questionnaire:</label>
                    <input type="text" id="checklist_name" name="checklist_name" placeholder="Enter Checklist Name"
                        value="<?php echo @$all_list['checklist_name']; ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="chapters">Falling Under the Milestone:</label>
                    <select name="chapters" id="chapters" required>
                        <option value="">--Select--</option>
                        <option value="100">chapter 1</option>
                        <option value="200">Chapter 2</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="scopeType" class="">Scope Type:</label>
                    <input type="radio" name="scopeType" value="Assignment Level" checked /> Assignment Level
                    <input type="radio" name="scopeType" value="Subject Level" checked /> Subject Level
                    <input type="radio" name="scopeType" value="Both " checked /> Both
                    <input type="radio" name="scopeType" value="Auto " checked /> Auto
                </div>
                <div class="col-md-6">
                    <label for="toolType" class="">Tool Type:</label>
                    <input type="radio" name="toolType" value="Questionnaires" checked /> Questionnaires
                    <input type="radio" name="toolType" value="Checklists" checked /> Checklists
                    <input type="radio" name="toolType" value="Form " checked /> Form
                </div>
                <div class="col-md-12">
                    <label for="audit_approach">Audit Approach :</label>
                    <textarea id="audit_approach" name="audit_approach" placeholder="Enter Audit Approach Name"
                        value="<?php echo @$all_list['audit_approach']; ?>" required></textarea>
                </div>

                <div class="col-md-4">
                    <label for="assertions">Assertions:</label>
                    <input type="text" id="assertions" name="assertions" placeholder="Enter Assertions Name"
                        value="<?php echo @$all_list['assertions']; ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="risks">Risks:</label>
                    <input type="text" id="risks" name="risks" value="<?php echo @$all_list['risks']; ?>"
                        placeholder="Enter Risks Name" required>
                </div>
                <div class="col-md-4">
                    <label for="misstatements">Misstatements:</label>
                    <input type="text" id="misstatements" name="misstatements"
                        value="<?php echo @$all_list['misstatements']; ?>" placeholder="Enter Misstatements Name"
                        required>
                </div>
                <div class="col-md-12 text-center">
                    <input type="hidden" name="edit_id" value="<?php echo @$all_list['id'] ?>">
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>