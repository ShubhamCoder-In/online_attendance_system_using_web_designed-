<div class="cover_image">
    <div class="cover_heading">
        <h4>Welcome to <span> our College Attendance</span> system</h4>
        <p>
            "Attendance Made Easy: Elevating Education through Online Efficiency!"
        </p>
        <?php 
            if($_SESSION['login']==false){
                echo '<div class="cover-btn">
                <button onclick="signu()"> register </button>  
                <button onclick="log_in()"> login </button>
            </div>';
            }
        ?>
    </div>
    <h3>Unlocking knowledge inspiring growth and fostering Success - discover the benefits of our education Platform today</h3>
</div>
<section class="top_section">
    <div class="container">
        <div class="group_list">
            <div class="column_group">
                <h3> online attendance system !</h3>
                <p>Our College Attendance System is a cutting-edge solution designed to simplify attendance tracking and improve communication between students, faculty, and administrators. With our user-friendly interface and powerful features, we're revolutionizing how attendance is managed in higher education.
                    <a href="#"> learn more...</a>
                </p>

            </div>
            <div class="column_group">
                <img src="./image/frame_img.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<section class="section2">
    <h3 class="section2_heading">feature key</h3>
    <div class="grid_list">
        <div class="grid_group">
            <h3>Effortless Attendance Tracking</h3>
            <p>Say goodbye to manual attendance sheets. Our system automates the process, making it a breeze for professors to mark attendance and for students to view their records.</p>
        </div>
        <div class="grid_group">
            <h3>Real-Time Monitoring</h3>
            <p>Stay up-to-date with attendance statistics in real-time. Professors can identify trends, and students can track their progress effortlessly.</p>
        </div>
        <div class="grid_group">
            <h3>Instant Notifications</h3>
            <p>Receive alerts for missed classes or low attendance percentages, ensuring you never miss an important update.</p>
        </div>
        <div class="grid_group">
            <h3>Data Analysis</h3>
            <p>We provide insightful analytics to help educators tailor their teaching methods and improve student outcomes.</p>
        </div>

        <div class="grid_group">
            <h3>Security First</h3>
            <p>Your data is secure with us. We follow stringent security measures to protect attendance records and comply with data protection regulations.</p>
        </div>
        <div class="grid_group">
            <h3>Seamless Integration</h3>
            <p>Our system seamlessly integrates with other educational management tools, making it a valuable addition to your institution's ecosystem.</p>
        </div>
    </div>
    </div>
</section>
<section class="advertiser_panel">
    <div class="container_ads">
        <div class="cart_list">
            <div class="cart_iterm"><img src="./image/cart1.jpg" alt=""></div>
            <div class="cart_iterm"><img src="./image/cart2.jpg" alt=""></div>
            <div class="cart_iterm"><img src="./image/cart3.jpg" alt=""></div>
        </div>
        <h3>Nurturing Excellence, Building Futures: Where Quality Meets Culture.</h3>
        <p>a quality educational institution's management and culture representative are marked by their effective leadership, dedication to inclusivity, and an unwavering commitment to improvement. This synergy between management and culture creates an environment where students not only excel academically but also grow personally, empowering them to succeed in an ever-evolving world. </p>
        <div class="ads_btn"><a href="#">learn more</a></div>
    </div>
</section>
<section class="section4">
    <div class="container_sect4">

        <h2 class="section4_heading">
            benefits of online attendance system
        </h2>
        <li>An online attendance system with real-time tracking capabilities is a powerful tool that offers numerous benefits to educational institutions, businesses, and organizations. This system leverages advanced technology to provide instant and accurate attendance data, transforming the way attendance is managed.

        </li>
        <li>
            Real-time tracking within an online attendance system ensures that attendance records are up-to-date and highly accurate. Instructors and administrators can monitor attendance as it happens, allowing for immediate intervention if issues arise. This level of immediacy is particularly valuable in educational settings, where prompt identification of attendance problems can help students stay on track with their coursework.

        </li>
        <li>
            Furthermore, real-time tracking offers a level of transparency and accountability that was previously challenging to achieve. Students, employees, or participants can view their attendance status in real time, fostering a sense of responsibility and encouraging punctuality. Instructors and managers benefit from the immediate feedback provided by the system, enabling them to make informed decisions and address attendance issues promptly.
        </li>
        <li>

            The ability to track attendance in real time also supports data-driven decision-making. Institutions can collect and analyze attendance data on an ongoing basis to identify trends and patterns. This information can be invaluable for improving scheduling, resource allocation, and instructional strategies. Real-time attendance tracking contributes to a more efficient and productive environment, ensuring that valuable time and resources are optimized.
        </li>
        <li>

            In conclusion, an online attendance system with real-time tracking capabilities revolutionizes how attendance is managed in various settings. It empowers institutions, instructors, and participants with immediate, accurate data that enhances transparency, accountability, and decision-making. This technology-driven solution streamlines attendance management and contributes to more effective and efficient operations, ultimately benefiting both educators and learners.</li>
    </div>
</section>
<section class="section5">
    <div class="contain-form">
        <div class="heading-form">
            <h1>contact from</h1>
            <p>Have Questions? Contact Us!</p>
        </div>
        <form action="./php_from/font_contact_from.php" method="post">
            <label for="email_new">name* </label>
            <input type="name" name="name" id="name" required>
            <label for="email_new">email* </label>
            <input type="email" name="email_new" id="email_new" required>
            <label for="message">message </label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <div class="group-btn">
                <input class="btn" type="submit" value="submit">
            </div>
            <div class="captain-form">
                <span>if your have already register? </span> <span onclick="log_in()"><a href="#">login</a></span>
        </div>
            </div>

        </form>
    </div>
</section>