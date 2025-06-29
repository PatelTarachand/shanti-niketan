<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Information - Shantineketan College</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-yellow: #FFD700;
            --dark-yellow: #FFA500;
            --text-dark: #2C3E50;
            --bg-light: #F8F9FA;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }
        
        .info-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            background: linear-gradient(135deg, var(--text-dark) 0%, #34495e 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .content {
            padding: 2rem;
        }
        
        .feature-card {
            background: var(--bg-light);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 4px solid var(--primary-yellow);
        }
        
        .credential-box {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1rem;
            margin: 0.5rem 0;
        }
        
        .btn-access {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            border: none;
            color: var(--text-dark);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-access:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
            color: var(--text-dark);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="info-container">
            <div class="header">
                <h1><i class="fas fa-graduation-cap me-3"></i>Shantineketan College</h1>
                <h3>Complete Management System</h3>
                <p class="mb-0">Admin Portal + Student Portal + Dynamic Website</p>
            </div>
            
            <div class="content">
                <!-- Quick Access -->
                <div class="row mb-4">
                    <div class="col-md-4 text-center mb-3">
                        <a href="{{ route('home') }}" class="btn-access w-100">
                            <i class="fas fa-globe me-2"></i>Public Website
                        </a>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <a href="{{ route('admin.login') }}" class="btn-access w-100">
                            <i class="fas fa-user-shield me-2"></i>Admin Portal
                        </a>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <a href="{{ route('student.login') }}" class="btn-access w-100">
                            <i class="fas fa-user-graduate me-2"></i>Student Portal
                        </a>
                    </div>
                </div>
                
                <!-- Login Credentials -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="feature-card">
                            <h5><i class="fas fa-user-shield text-warning me-2"></i>Admin Login Credentials</h5>
                            
                            <div class="credential-box">
                                <strong>Super Admin:</strong><br>
                                <code>Email: admin@shantiniketan.edu.in</code><br>
                                <code>Password: admin123</code>
                            </div>
                            
                            <div class="credential-box">
                                <strong>Principal:</strong><br>
                                <code>Email: principal@shantiniketan.edu.in</code><br>
                                <code>Password: principal123</code>
                            </div>
                            
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Admin can manage notices, faculty, gallery, and all content
                            </small>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="feature-card">
                            <h5><i class="fas fa-user-graduate text-primary me-2"></i>Student Login Credentials</h5>
                            
                            <div class="credential-box">
                                <strong>Rahul Sharma (B.Tech CSE):</strong><br>
                                <code>Student ID: SNC2023001</code><br>
                                <code>Password: student123</code>
                            </div>
                            
                            <div class="credential-box">
                                <strong>Priya Patel (MBA):</strong><br>
                                <code>Student ID: SNC2023002</code><br>
                                <code>Password: student123</code>
                            </div>
                            
                            <div class="credential-box">
                                <strong>Amit Kumar (B.Com):</strong><br>
                                <code>Student ID: SNC2023003</code><br>
                                <code>Password: student123</code>
                            </div>
                            
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Students can view results, fees, timetable, and profile
                            </small>
                        </div>
                    </div>
                </div>
                
                <!-- System Features -->
                <div class="row mt-4">
                    <div class="col-12">
                        <h4 class="mb-3">🚀 System Features</h4>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="feature-card">
                            <h6><i class="fas fa-cogs text-warning me-2"></i>Admin Features</h6>
                            <ul class="small mb-0">
                                <li>✅ Complete Notice Management</li>
                                <li>✅ Faculty Profile Management</li>
                                <li>✅ Gallery Management</li>
                                <li>✅ File Upload System</li>
                                <li>✅ Real-time Statistics</li>
                                <li>✅ Professional Dashboard</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="feature-card">
                            <h6><i class="fas fa-graduation-cap text-primary me-2"></i>Student Features</h6>
                            <ul class="small mb-0">
                                <li>✅ Personal Dashboard</li>
                                <li>✅ Academic Results</li>
                                <li>✅ Fee Management</li>
                                <li>✅ Timetable Access</li>
                                <li>✅ Profile Management</li>
                                <li>✅ Notice Viewing</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="feature-card">
                            <h6><i class="fas fa-globe text-success me-2"></i>Website Features</h6>
                            <ul class="small mb-0">
                                <li>✅ Dynamic Content</li>
                                <li>✅ Responsive Design</li>
                                <li>✅ Real-time Updates</li>
                                <li>✅ Professional UI/UX</li>
                                <li>✅ Mobile Friendly</li>
                                <li>✅ SEO Optimized</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Technical Details -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="feature-card">
                            <h6><i class="fas fa-code text-info me-2"></i>Technical Implementation</h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Backend:</strong><br>
                                    <small>Laravel 11, PHP 8.2, MySQL</small>
                                </div>
                                <div class="col-md-3">
                                    <strong>Frontend:</strong><br>
                                    <small>Bootstrap 5, jQuery, Chart.js</small>
                                </div>
                                <div class="col-md-3">
                                    <strong>Authentication:</strong><br>
                                    <small>Multi-guard (Admin/Student)</small>
                                </div>
                                <div class="col-md-3">
                                    <strong>Features:</strong><br>
                                    <small>File Upload, CRUD, Responsive</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="feature-card text-center">
                            <h6><i class="fas fa-phone text-warning me-2"></i>College Contact Information</h6>
                            <p class="mb-1"><strong>Email:</strong> shantiniketan2009@yahoo.co.in</p>
                            <p class="mb-1"><strong>Phone:</strong> +91 94255 14719</p>
                            <p class="mb-0"><strong>Address:</strong> Ring Road No.1, Near Pani Tanki, Changorbhatha, Raipur, Chhattisgarh 492001</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
