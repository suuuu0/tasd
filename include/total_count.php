 <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
			<?php 
				$obj_student->ShowCourses();
				$num_student = $obj_student->GetNumRows();
			?>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $num_student; ?>" data-purecounter-duration="1" class="purecounter"></span>
			
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
		  <?php 
				$obj_course->ShowCourses();
				$num_course = $obj_course->GetNumRows();
			?>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $num_course; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
		  <?php 
				$obj_event->ShowCourses();
				$num_event = $obj_event->GetNumRows();
			?>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $num_event; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
		  <?php 
				$obj_trainer->ShowCourses();
				$num_trainer = $obj_trainer->GetNumRows();
			?>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $num_trainer; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->