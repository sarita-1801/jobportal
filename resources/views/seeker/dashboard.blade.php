@extends('template.template')

@section('pagecontent')
 
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

@endsection