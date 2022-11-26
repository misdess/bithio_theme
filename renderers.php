<?php 

defined('MOODLE_INTERNAL') || die();
//the commented line below can be used to direct the file source of the extended class.
//require_once($CFG->dirroot .'/lib/outputrenderers.php');

class theme_bithio_core_renderer extends theme_boost\output\core_renderer{
    
/* 
/**
     * Performance information and validation links for debugging.
     *
     * @return string HTML fragment.
     */
    public function debug_footer_html() {
        global $CFG, $SCRIPT;
        $output = '';
        if (during_initial_install()) {
            // Debugging info can not work before install is finished.
            return $output;
        }

        // This function is normally called from a layout.php file
        // but some of the content won't be known until later, so we return a placeholder
        // for now. This will be replaced with the real content in the footer.
        $output .= $this->unique_performance_info_token;

        if (!empty($CFG->debugpageinfo)) {
            $output .= '<div class="performanceinfo pageinfo">' . get_string('pageinfodebugsummary', 'core_admin',
                $this->page->debug_summary()) . '</div>';
        }
        if (debugging(null, DEBUG_DEVELOPER) and has_capability('moodle/site:config', context_system::instance())) {  // Only in developer mode

            // Add link to profiling report if necessary
            if (function_exists('profiling_is_running') && profiling_is_running()) {
                $txt = get_string('profiledscript', 'admin');
                $title = get_string('profiledscriptview', 'admin');
                $url = $CFG->wwwroot . '/admin/tool/profiling/index.php?script=' . urlencode($SCRIPT);
                $link= '<a title="' . $title . '" href="' . $url . '">' . $txt . '</a>';
                $output .= '<div class="profilingfooter">' . $link . '</div>';
            }
            $purgeurl = new moodle_url('/admin/purgecaches.php', array('confirm' => 1,
                'sesskey' => sesskey(), 'returnurl' => $this->page->url->out_as_local_url(false)));
            $output .= '<div class="purgecaches">' .
                    html_writer::link($purgeurl, get_string('purgecaches', 'admin')) . '</div>';

            // Reactive module debug panel.
            $output .= $this->render_from_template('core/local/reactive/debugpanel', []);
        }
        if (!empty($CFG->debugvalidators)) {
            $siteurl = qualified_me();
            $nuurl = new moodle_url('https://validator.w3.org/nu/', ['doc' => $siteurl, 'showsource' => 'yes']);
            $waveurl = new moodle_url('https://wave.webaim.org/report#/' . urlencode($siteurl));
            $validatorlinks = [
                html_writer::link($nuurl, get_string('validatehtml')),
                html_writer::link($waveurl, get_string('wcagcheck'))
            ];
            $validatorlinkslist = html_writer::alist($validatorlinks, ['class' => 'list-unstyled ml-1']);
            $output .= html_writer::div($validatorlinkslist, 'validators');
        }
        //$output .= html_writer::div('Mr Atsbha has writen this message for editing purpose.', 'container-fluid footer-dark-inner', array('id' => 'tophat'));
       /* defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot .'/theme/bithio/files/footer.html');
        $output .='Conguratulations bravo you dit it!';
         include'footer';
       /* $output.= 'added on date:';
        $output .=html_writer::start_tag(tagname:'strong');
        $output.=date_format_string($mod->added, format:'%y-%m');
        $output .=html_writer::end_tag(tagname:'strong');  */
        //include($CFG->dirroot .'/theme/bithio/files/footer.html');
        


        //code for the couse block.


        //the cod below is for the footer on the site
        $output .= html_writer::start_div('Box');
        $output .= html_writer::start_div('style="padding-left:18px;"Box1</h6>');
        $output .= html_writer::div('<h6><br>About Us</h6>','f1bh');
        $output .= html_writer::div('Bithio ICT Systems PLC','f1');
        $output .= html_writer::div('Addis Ababa, Ethiopia','f1');
        $output .= html_writer::div('<a style="text-decoration: none;" href="http://localhost/moodle/my/courses.php">www.bithio.com</a>','f1');
        $output .= html_writer::end_div('Box1');

        $output .= html_writer::start_div('style="padding-left:18px;"Box2');
        $output .= html_writer::div('<h6><br>Products And Services</h6>','f1bh');
        $output .= html_writer::div('eLearning systems','f1');
        $output .= html_writer::div('Products and Services','f1');
        $output .= html_writer::div('Digital library','f1');
        $output .= html_writer::end_div('Box2');

        $output .= html_writer::start_div('style="padding-right:28px;"Box3');
        $output .= html_writer::div('<h6><br>Contact Us</h6>','f1bh');
        $output .= html_writer::div('Ethio ICT Park','f1');
        $output .= html_writer::div('Bole Sub City, Woreda 11','f1');
        $output .= html_writer::div('<a style="text-decoration: none;" href="#">Email: info@bithio.com</a>','f1');
        $output .= html_writer::end_div('Box3');

        $output .= html_writer::start_div('style="padding-right:28px;"Box4');
        $output .= html_writer::div('<h6><br>Follow Us</h6>','f1bh');
        $output .= html_writer::div('<h6><a style="text-decoration:none;" href="#" class="fa fa-facebook"></a></h6>','f1');
        $output .= html_writer::div('<h6><a style="text-decoration:none;" href="#" class="fa fa-twitter"></a></h6>','f1');
        $output .= html_writer::div('<h6><a style="text-decoration:none;" href="#" class="fa fa-instagram"></a></h6>','f1');
        $output .= html_writer::div('<br>');
        // $output .= html_writer::div('<strong><h5><a style="text-decoration:none;" href="#" class="fa fa-telegram"></a><h5></strong>');
        $output .= html_writer::end_div('Box4');
        $output .= html_writer::end_div('Box');

        $output .= html_writer::start_div('bottom');
        $output .= html_writer::end_div('bottom');
        $output .= html_writer::start_div('ccopy');
        $output .= html_writer::div( '<br>©2021 Bithio ICT Systems. All Rights Reserved','f1');
        $output .= html_writer::div('<br><a style="text-decoration: none;" href="https://www.bithio.com/admin/tool/policy/viewall.php?returnurl=https%3A%2F%2Fwww.bithio.com%2F">policies</a>','f1');
       // html_writer::div(include($CFG->dirroot .'/theme/bithio/files/footer.html'));
        //include($CFG->dirroot .'/theme/bithio/files/footer.html');
        $output .= html_writer::end_div('<br>ccopy');
        $output .=html_writer::div("<br>");
        return $output;
    }}




// from this on, the code is for the course boxes on the front page and their content


require_once($CFG->dirroot .'/course/renderer.php');
class theme_bithio_core_course_renderer extends core_course_renderer{

    protected function coursecat_coursebox(coursecat_helper $chelper, $course, $additionalclasses = '') {//nothing is updated for this method.
        if (!isset($this->strings->summary)) {
            $this->strings->summary = get_string('summary');
        }
        if ($chelper->get_show_courses() <= self::COURSECAT_SHOW_COURSES_COUNT) {
            return '';
        }
        if ($course instanceof stdClass) {
            $course = new core_course_list_element($course);
        }
        $content = '';
        $classes = trim('coursebox clearfix '. $additionalclasses);
        if ($chelper->get_show_courses() < self::COURSECAT_SHOW_COURSES_EXPANDED) {
            $classes .= ' collapsed';
        }

        // .coursebox
        $content .= html_writer::start_tag('div', array(
            'class' => $classes,
            'data-courseid' => $course->id,
            'data-type' => self::COURSECAT_TYPE_COURSE,
        ));

        $content .= html_writer::start_tag('div', array('class' => 'info'));
        $content .= $this->course_name($chelper, $course);
        $content .= $this->course_enrolment_icons($course);
        $content .= html_writer::end_tag('div');

        $content .= html_writer::start_tag('div', array('class' => 'content'));
        $content .= $this->coursecat_coursebox_content($chelper, $course);
        $content .= html_writer::end_tag('div');

        $content .= html_writer::end_tag('div'); // .coursebox
        return $content;
    }

    /**
     * Returns HTML to display course summary.
     *
     * @param coursecat_helper $chelper
     * @param core_course_list_element $course
     * @return string
     */
    protected function course_summary(coursecat_helper $chelper, core_course_list_element $course): string {// the change is done here.
        $content = '';
        if ($course->has_summary()) {
            $content .= html_writer::start_tag('div', ['class' => 'summary']);
            $content .= $chelper->get_course_formatted_summary($course,
                array('overflowdiv' => true, 'noclean' => true, 'para' => false));
            $content .= html_writer::end_tag('div');
        }
        return $content;
    }

    /**
     * Returns HTML to display course contacts.
     *
     * @param core_course_list_element $course
     * @return string
     */
    protected function course_contacts(core_course_list_element $course) {
        $content = '';
        if ($course->has_course_contacts()) {
            $content .= html_writer::start_tag('ul', ['class' => 'teachers']);
            foreach ($course->get_course_contacts() as $coursecontact) {
                $rolenames = array_map(function ($role) {
                    return $role->displayname;
                }, $coursecontact['roles']);
                $name = html_writer::tag('span', implode(", ", $rolenames).': ', ['class' => 'font-weight-bold']);
                $name .= html_writer::link(new moodle_url('/user/view.php',
                        ['id' => $coursecontact['user']->id, 'course' => SITEID]),
                        $coursecontact['username']);
                $content .= html_writer::tag('li', $name);
            }
            $content .= html_writer::end_tag('ul');
        }
//$content .=html_writer::div('<strong >$15.00</strong> or <strong >900.00</strong> birr');//this is a new line added now.
        return $content;
    }
    //the code below is for the front page above the list of available courses.
    public function frontpage_section1() {
        global $SITE, $USER;

        $output = '';
        $editing = $this->page->user_is_editing();

        if ($editing) {
            // Make sure section with number 1 exists.
            course_create_sections_if_missing($SITE, 1);
        }

        $modinfo = get_fast_modinfo($SITE);
        $section = $modinfo->get_section_info(1);


        if (($section && (!empty($modinfo->sections[1]) or !empty($section->summary))) or $editing) {

            $format = course_get_format($SITE);
            $frontpageclass = $format->get_output_classname('content\\frontpagesection');
            $frontpagesection = new $frontpageclass($format, $section);

            // The course outputs works with format renderers, not with course renderers.
            $renderer = $format->get_renderer($this->page);
            $output .= $renderer->render($frontpagesection);
        }
        //the code below is an image for the front page in the first block
        $output .= html_writer::start_div('frontblock');
        $output .= html_writer::start_div('style="padding-left:1px;"frontblock1</h6>');
       // $output .= html_writer::div('<h6><br>About Us</h6>');
        //$output .= html_writer::div('Bithio ICT Systems PLC<br><img src="theme/bithio/pix/courseimages/marketing1.png">','frontblock1');
        $output .= html_writer::span('<img src="theme/bithio/pix/pages/frontpage.png" alt="An image is lost.">','marketingb1');
       // $output .= html_writer::div('Addis Ababa, Ethiopia','f1');
       // $output .= html_writer::div('<a style="text-decoration: none;" href="http://localhost/moodle/my/courses.php">www.bithio.com</a>','f1');
        $output .= html_writer::end_div('frontblock1');
        $output .=html_writer::end_div('frontblock');
        $output.='<br><br>';//this line makes a gap between the blocks

        //The next blocks are for others
        $output .= html_writer::start_div('frontblocksecond');
        $output .= html_writer::start_div('style="padding-left:18px;"frontblock2</h6>');
        //$output .= html_writer::div('<h6><center><br>About Us</h6>','a1');
        $output .= html_writer::div('<h4><center><br>Are you a school?</h4><img src="theme/bithio/pix/pages/school.png"><center>Save cost of paperwork and improve your student <br>learning outcome through the power of technology<br><br>','a1');
        //$output .= html_writer::div('<h4><center><br>Are you a school?</h4><img src="theme/bithio/pix/courseimages/block1.png"><button class="blocks"><a href="http://localhost/moodle/login/signup.php">click-here<br></a></button><br><br><center>Save cost of paperwork and improve your student <br>learning outcome through the power of technology<br><br>','a1');
        $output .= html_writer::end_div('frontblock2');
        $output.='<br><br>';//this line makes a gap between the blocks
        
        $output .= html_writer::start_div('style="padding-left:18px;"frontblock3');
       // $output .= html_writer::div('<h6><center><br>Products And Services</h6>','a1');
        $output .= html_writer::div('<h4><center><br>Are you a teacher?</h4><img src="theme/bithio/pix/pages/teacher.png"><center>Get trained on educational technologies and<br> engage your students better.<br><br>','a1');
        $output .= html_writer::end_div('frontblock3');
        $output.='<br><br>';//this line makes a gap between the blocks

        $output .= html_writer::start_div('style="padding-left:18px;"frontblock4');
       // $output .= html_writer::div('<h6><center><br>For Further Information</h6>','a1');
        $output .= html_writer::div('<h4><center><br>Are you a student?</h4><img src="theme/bithio/pix/pages/student.png"><center>Access your classroom online and <br>make your learning fun and rewarding.<br><br>','a1');
        $output .= html_writer::end_div('frontblock4');
        $output.='<br><br>';
        $output .= html_writer::end_div('frontblocksecond');
        $output.='<br><br>';

        //The next blocks are others.
       // $output .= html_writer::start_div('Box');
        $output .= html_writer::start_div('p1');
        $output .= html_writer::start_div('p1_inner1');
        $output .= html_writer::div('<h1><center><br><br>Every one needs to equip the 21st century digital skills,<br>regardless of the time when and where they are.<br><br><br></h1>','p1');
        


        //the code below is for a text on an image
        $output .= html_writer::start_div('marketingb1');
        $output .= html_writer::div('<br>','gap3');
       // $output .= html_writer::div('<img src="theme/bithio/pix/pages/frontpage.png" alt="An image is lost.">','marketingb1');
        //$output .= html_writer::div('<h3>Online Learning Center</h3><p>Learn with bithio online Learning</p>','marketingb1');
        $output .= html_writer::end_div('marketingb1');
        //the two lines below are the closing of the the second block from the above
        $output .= html_writer::end_div('p1_inner1');
        $output .= html_writer::end_div('p1');
        //require_once($CFG->dirroot .'/theme/bithio/layout/on_image_text.html');


        return $output;
    }
}
//the code below id the 'custom_menu' class
class theme_bithio_core_renderers extends core_renderer {

    protected function render_custom_menu(custom_menu $menu) {
        // Our code will go here shortly
        $mycourses = $this->page->navigation->get('mycourses');

if (isloggedin() && $mycourses && $mycourses->has_children()) {
    $branchlabel = get_string('mycourses');
    $branchurl   = new moodle_url('/course/index.php');
    $branchtitle = $branchlabel;
    $branchsort  = 10000;

    $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);

    foreach ($mycourses->children as $coursenode) {
        $branch->add($coursenode->get_content(), $coursenode->action, $coursenode->get_title());
    }
}

return parent::render_custom_menu($menu);
    }

}