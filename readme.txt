Written by: Richard Havinga 2012 richard.havinga@southampton-city.ac.uk

----------------------------------------------------------------------------------------

This plugin is designed as part of a set of plugins called GSB Medal. The set allows you to benchmark courses to select criteria based upon activity 
and resource types and then display a medal to teachers on a course. You can decide to run these manually and approve the automatic medals as well as override them,
or you can choose for them to auto-calculate every time an administrator or teacher visits a particular course. 

TODO: Write a Star Rating System Block for students to rate their course which can also be added to the benchmarking criteria. 

1. To install unzip the gsb.zip file, then two folders (admin and blocks)to the root moodle folder.

2. Next log into Moodle as an administrator and visit: http:/your-moodle-address/admin  which will install the gsb block.

3. You're now good to go. From the administrators menu go to: Reports > GSB Medal. You'll see a summary of your moodle which will be zeroed to start with. 
   You will need to select each of the categories in the drop down category list and press "Process GSB Medals". You will be taken back to the main admin screen after you process each category, you will see a confirmation message of the last category processed and the GSB summary will increase.
   You should process all categories before attempting to download the GSB report. The settings for the criteria can be found under plugins > Reports > GSB Medal if you wish to change them from the defaults. 

4. The GSB block can be added to courses in the normal way.

5. The following html file is linked to the GSB block and gives teachers an explanation of what the GSB medal means, how to improve it and who to contact in your institution if they need help. You will need to change this to reflect your instituion:
   http://your-moodle-address/blocks/gsb/gsb_explained.htm

Important: You probably want to hide the GSB block from students but leave it visible for teachers, non-editing teachers etc. You can do this under: Site Admin > Users > Permissions > Define Roles   edit the student and guest roles and change block/gsb:viewgsb to Prevent.
		   

