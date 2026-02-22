@extends('template.template')

@section('pagecontent')
 
<!-- Home Start -->
<div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('frontend/img/home1.jpeg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                 style="background: rgba(43, 57, 64, .5);">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 text-center">
                            <h3 class="display-4 text-white animated slideInDown mb-4">Your Career Starts Here</h3>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">A simple job portal designed to make job searching and hiring faster.</p>
                            
                            <!-- SEARCH BOX -->
                            <div class="search-box mt-5">
                                <form class="row g-2">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Job title, Company...">
                                    </div>

                                    <div class="col-md-3">
                                        <select class="form-select">
                                            <option>Select Region</option>
                                            <option>Nepal</option>
                                            <option>India</option>
                                            <option>Remote</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <select class="form-select">
                                            <option>Select Job Type</option>
                                            <option>Full Time</option>
                                            <option>Part Time</option>
                                            <option>Internship</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <button class="btn btn-success w-200 text-nowrap">
                                            🔍 Search Job
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- TRENDING -->
                            <div class="trending mt-4">
                                <span class="trending-label me-2">Trending Keywords:</span>
                                <span class="badge keyword-badge">UI Designer</span>
                                <span class="badge keyword-badge">Python</span>
                                <span class="badge keyword-badge">Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Home End -->

<!-- JobBoard Site Stats Start -->
<style>
    .jobboard-stats-container {
    max-width: 1200px;
    width: 100%;
    background-color: rgb(80, 243, 99);
    overflow: hidden;
    padding: 60px;
    margin: 80px auto;
}
    
    .stats-header {
        text-align: center;
        margin-bottom: 50px;
        padding-bottom: 30px;
        border-bottom: 1px solid #eef2f7;
    }
    
    .stats-header h1 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #09090a;
        margin-bottom: 20px;
        letter-spacing: -0.5px;
    }
    
    .stats-description {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #121213;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
    }
    
    .stat-card {
        background: #f8fafc;
        border-radius: 16px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(to right, #3b82f6, #8b5cf6);
    }
    
    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(41, 41, 41, 0.15);
        border-color: #3b82f6;
    }
    
    .stat-number {
        font-size: 2.6rem;
        font-weight: 500;
        color: #0d0d0e;
        margin-bottom: 10px;
        line-height: 1;
    }
    
    .stat-label {
        font-size: 1.1rem;
        color: #475569;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .stat-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 12px;
        margin-bottom: 20px;
        color: white;
        font-size: 1.5rem;
    }
    
    @media (max-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
        
        .stats-header h1 {
            font-size: 2.4rem;
        }
    }
    
    @media (max-width: 768px) {
        .jobboard-stats-container {
            padding: 25px;
            margin: 60px 20px;
        }
        
        .stats-header h1 {
            font-size: 2rem;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .stat-number {
            font-size: 3rem;
        }
    }
    
    @media (max-width: 480px) {
        .jobboard-stats-container {
            padding: 20px;
        }
        
        .stats-header h1 {
            font-size: 1.8rem;
        }
        
        .stats-description {
            font-size: 1rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
        }
    }
    
    /* Animation for numbers */
    @keyframes countUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    .stat-number {
        animation: countUp 0.8s ease-out;
    }
    
    /* Pulse animation for cards */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.02); }
        100% { transform: scale(1); }
    }
    
    .stat-card:hover {
        animation: pulse 1.5s infinite;
    }
</style>

<div class="jobboard-stats-container">
    <div class="stats-header">
        <h1>Jobify Status</h1>
        <p class="stats-description">
            Our platform partners with verified employers to provide genuine job opportunities. Companies can post jobs, manage applications, and connect with candidates efficiently, making Jobify a trusted hub for both employers and job seekers.
        </p>
    </div>
    
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-number">1,930</div>
            <div class="stat-label">Candidates</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="stat-number">54</div>
            <div class="stat-label">Jobs Posted</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-number">120</div>
            <div class="stat-label">Jobs Filled</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-number">550</div>
            <div class="stat-label">Companies</div>
        </div>
    </div>
</div>
<!-- JobBoard Site Stats End -->

<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                    <h6 class="mb-3">Marketing</h6>
                    <p class="mb-0">123 Vacancy</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                    <h6 class="mb-3">Customer Service</h6>
                    <p class="mb-0">123 Vacancy</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                    <h6 class="mb-3">Human Resource</h6>
                    <p class="mb-0">123 Vacancy</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                    <h6 class="mb-3">Project Management</h6>
                    <p class="mb-0">123 Vacancy</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                    <h6 class="mb-3">Business Development</h6>
                    <p class="mb-0">123 Vacancy</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                    <h6 class="mb-3">Sales & Communication</h6>
                    <p class="mb-0">123 Vacancy</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                    <h6 class="mb-3">Teaching & Education</h6>
                    <p class="mb-0">123 Vacancy</p>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                    <h6 class="mb-3">Design & Creative</h6>
                    <p class="mb-0">123 Vacancy</p>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Add this CSS to your stylesheet -->
<style>
    /* Additional styling to ensure black color */
    .cat-item {
        color: #000000 !important;
        transition: all 0.3s ease;
    }
    
    .cat-item:hover {
        background-color: #f5f5f5 !important;
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
</style>
<!-- Category End -->

<!-- Rest of your existing code continues here... -->
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 about-bg rounded overflow-hidden">
                    <div class="col-6 text-start">
                        <img class="img-fluid w-100" src="{{asset('frontend/img/about-1.jpg')}}">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid" src="{{asset('frontend/img/about-2.jpg')}}" style="width: 85%; margin-top: 15%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid" src="{{asset('frontend/img/about-3.jpg')}}" style="width: 85%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid w-100" src="{{asset('frontend/img/about-4.jpg')}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                <p class="mb-4">Jobify is an online job portal that helps people find jobs easily and allows companies to hire suitable candidates. We aim to make the hiring process simple and efficient.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Easy job search and application process</p>
                <p><i class="fa fa-check text-primary me-3"></i>Verified employers and genuine job listings</p>
                <p><i class="fa fa-check text-primary me-3"></i>Smart matching between jobs and candidates</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection