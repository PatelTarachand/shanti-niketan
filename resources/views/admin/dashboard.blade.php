@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Welcome Header -->
<div class="row mb-4">
    <div class="col-12">
        <div class="welcome-card">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="welcome-title">Welcome back, {{ Auth::guard('admin')->user()->name }}! 👋</h2>
                    <p class="welcome-subtitle">Here's what's happening at Shantineketan College today</p>
                    <div class="today-stats">
                        <span class="stat-item">
                            <i class="fas fa-file-alt text-warning"></i>
                            {{ $today_stats['new_applications_today'] }} new applications
                        </span>
                        <span class="stat-item">
                            <i class="fas fa-bullhorn text-primary"></i>
                            {{ $today_stats['new_notices_today'] }} new notices
                        </span>
                        <span class="stat-item">
                            <i class="fas fa-user-plus text-success"></i>
                            {{ $today_stats['new_faculty_today'] }} new faculty
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 text-end">
                    <div class="welcome-actions">
                        <a href="{{ route('admin.applications.index') }}" class="btn btn-primary me-2">
                            <i class="fas fa-file-alt me-2"></i>View Applications
                        </a>
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary">
                            <i class="fas fa-external-link-alt me-2"></i>Visit Site
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Enhanced Stats Cards -->
<div class="row mb-4">
    <!-- Applications Card -->
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stats-card stats-card-gradient-orange">
            <div class="stats-card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="stats-title">Applications</div>
                        <div class="stats-number">{{ $stats['total_applications'] }}</div>
                        <div class="stats-progress">
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: {{ $stats['total_applications'] > 0 ? ($stats['pending_applications'] / $stats['total_applications']) * 100 : 0 }}%"></div>
                            </div>
                            <small class="text-muted">{{ $stats['pending_applications'] }} pending review</small>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stats-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stats-card-footer">
                <a href="{{ route('admin.applications.index') }}" class="stats-link">
                    <span>View Details</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Faculty Card -->
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stats-card stats-card-gradient-green">
            <div class="stats-card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="stats-title">Faculty Members</div>
                        <div class="stats-number">{{ $stats['total_faculty'] }}</div>
                        <div class="stats-progress">
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: {{ $stats['total_faculty'] > 0 ? ($stats['active_faculty'] / $stats['total_faculty']) * 100 : 0 }}%"></div>
                            </div>
                            <small class="text-muted">{{ $stats['active_faculty'] }} active members</small>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stats-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stats-card-footer">
                <a href="{{ route('admin.faculty.index') }}" class="stats-link">
                    <span>View Details</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Alumni Card -->
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stats-card stats-card-gradient-blue">
            <div class="stats-card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="stats-title">Alumni Network</div>
                        <div class="stats-number">{{ $stats['total_alumni'] }}</div>
                        <div class="stats-progress">
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: {{ $stats['total_alumni'] > 0 ? ($stats['active_alumni'] / $stats['total_alumni']) * 100 : 0 }}%"></div>
                            </div>
                            <small class="text-muted">{{ $stats['active_alumni'] }} active alumni</small>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stats-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stats-card-footer">
                <a href="{{ route('admin.alumni.index') }}" class="stats-link">
                    <span>View Details</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Notices Card -->
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stats-card stats-card-gradient-purple">
            <div class="stats-card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="stats-title">Notices</div>
                        <div class="stats-number">{{ $stats['total_notices'] }}</div>
                        <div class="stats-progress">
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: {{ $stats['total_notices'] > 0 ? ($stats['active_notices'] / $stats['total_notices']) * 100 : 0 }}%"></div>
                            </div>
                            <small class="text-muted">{{ $stats['active_notices'] }} active notices</small>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stats-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stats-card-footer">
                <a href="{{ route('admin.notices.index') }}" class="stats-link">
                    <span>View Details</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Secondary Stats Row -->
<div class="row mb-4">
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="mini-stats-card bg-gradient-success">
            <div class="mini-stats-content">
                <div class="mini-stats-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="mini-stats-info">
                    <h4>{{ $stats['total_courses'] }}</h4>
                    <p>Total Courses</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="mini-stats-card bg-gradient-info">
            <div class="mini-stats-content">
                <div class="mini-stats-icon">
                    <i class="fas fa-images"></i>
                </div>
                <div class="mini-stats-info">
                    <h4>{{ $stats['total_gallery'] }}</h4>
                    <p>Gallery Items</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="mini-stats-card bg-gradient-warning">
            <div class="mini-stats-content">
                <div class="mini-stats-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="mini-stats-info">
                    <h4>{{ $stats['approved_applications'] }}</h4>
                    <p>Approved Apps</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="mini-stats-card bg-gradient-danger">
            <div class="mini-stats-content">
                <div class="mini-stats-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="mini-stats-info">
                    <h4>{{ $stats['total_admins'] }}</h4>
                    <p>Admin Users</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Analytics Charts Row -->
<div class="row mb-4">
    <!-- Applications Trend Chart -->
    <div class="col-lg-8 mb-4">
        <div class="chart-card">
            <div class="chart-header">
                <h5 class="chart-title">Applications Trend (Last 7 Days)</h5>
                <div class="chart-actions">
                    <button class="btn btn-sm btn-outline-primary" onclick="refreshChart('applications')">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
            </div>
            <div class="chart-body">
                <canvas id="applicationsChart" height="100"></canvas>
            </div>
        </div>
    </div>

    <!-- Applications Status Pie Chart -->
    <div class="col-lg-4 mb-4">
        <div class="chart-card">
            <div class="chart-header">
                <h5 class="chart-title">Application Status</h5>
            </div>
            <div class="chart-body">
                <canvas id="statusChart" height="200"></canvas>
            </div>
            <div class="chart-legend">
                <div class="legend-item">
                    <span class="legend-color bg-warning"></span>
                    <span>Pending ({{ $analytics['applications_by_status']['pending'] }})</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color bg-info"></span>
                    <span>Under Review ({{ $analytics['applications_by_status']['under_review'] }})</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color bg-success"></span>
                    <span>Approved ({{ $analytics['applications_by_status']['approved'] }})</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color bg-danger"></span>
                    <span>Rejected ({{ $analytics['applications_by_status']['rejected'] }})</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="quick-actions-card">
            <div class="quick-actions-header">
                <h5 class="mb-0">Quick Actions</h5>
                <p class="text-muted mb-0">Frequently used administrative tasks</p>
            </div>
            <div class="quick-actions-grid">
                <a href="{{ route('admin.notices.create') }}" class="quick-action-item">
                    <div class="quick-action-icon bg-primary">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="quick-action-content">
                        <h6>Add Notice</h6>
                        <p>Create new announcement</p>
                    </div>
                </a>

                <a href="{{ route('admin.faculty.create') }}" class="quick-action-item">
                    <div class="quick-action-icon bg-success">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="quick-action-content">
                        <h6>Add Faculty</h6>
                        <p>Register new faculty member</p>
                    </div>
                </a>

                <a href="{{ route('admin.applications.index') }}" class="quick-action-item">
                    <div class="quick-action-icon bg-warning">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="quick-action-content">
                        <h6>Review Applications</h6>
                        <p>{{ $stats['pending_applications'] }} pending</p>
                    </div>
                </a>

                <a href="{{ route('admin.gallery.create') }}" class="quick-action-item">
                    <div class="quick-action-icon bg-info">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="quick-action-content">
                        <h6>Add Gallery</h6>
                        <p>Upload new media</p>
                    </div>
                </a>

                <a href="{{ route('admin.alumni.create') }}" class="quick-action-item">
                    <div class="quick-action-icon bg-purple">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="quick-action-content">
                        <h6>Add Alumni</h6>
                        <p>Register graduate</p>
                    </div>
                </a>

                <a href="{{ route('home') }}" target="_blank" class="quick-action-item">
                    <div class="quick-action-icon bg-secondary">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                    <div class="quick-action-content">
                        <h6>View Website</h6>
                        <p>Open public site</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity & System Info -->
<div class="row">
    <!-- Recent Applications -->
    <div class="col-lg-6 mb-4">
        <div class="activity-card">
            <div class="activity-header">
                <h5 class="activity-title">Recent Applications</h5>
                <a href="{{ route('admin.applications.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="activity-body">
                @if($recent_applications->count() > 0)
                    @foreach($recent_applications as $application)
                    <div class="activity-item">
                        <div class="activity-avatar">
                            <div class="avatar-circle bg-warning">
                                <i class="fas fa-file-alt"></i>
                            </div>
                        </div>
                        <div class="activity-content">
                            <h6 class="activity-name">{{ $application->name }}</h6>
                            <p class="activity-description">Applied for {{ $application->course }}</p>
                            <span class="activity-time">{{ $application->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="activity-status">
                            <span class="badge {{ $application->status_badge }}">{{ $application->status_text }}</span>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No recent applications</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Faculty -->
    <div class="col-lg-6 mb-4">
        <div class="activity-card">
            <div class="activity-header">
                <h5 class="activity-title">Recent Faculty</h5>
                <a href="{{ route('admin.faculty.index') }}" class="btn btn-sm btn-outline-success">View All</a>
            </div>
            <div class="activity-body">
                @if($recent_faculty->count() > 0)
                    @foreach($recent_faculty as $faculty)
                    <div class="activity-item">
                        <div class="activity-avatar">
                            @if($faculty->image)
                                <img src="{{ Storage::url($faculty->image) }}" alt="{{ $faculty->name }}" class="avatar-image">
                            @else
                                <div class="avatar-circle bg-success">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                        </div>
                        <div class="activity-content">
                            <h6 class="activity-name">{{ $faculty->name }}</h6>
                            <p class="activity-description">{{ $faculty->designation }} - {{ $faculty->department }}</p>
                            <span class="activity-time">{{ $faculty->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="activity-status">
                            @if($faculty->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <i class="fas fa-chalkboard-teacher fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No recent faculty</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- System Health & Information -->
<div class="row">
    <!-- System Health -->
    <div class="col-lg-8 mb-4">
        <div class="system-card">
            <div class="system-header">
                <h5 class="system-title">System Health</h5>
                <span class="system-status status-healthy">All Systems Operational</span>
            </div>
            <div class="system-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="health-metric">
                            <div class="metric-icon bg-success">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="metric-info">
                                <h6>Database</h6>
                                <p class="text-success">{{ ucfirst($system_health['database_status']) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="health-metric">
                            <div class="metric-icon bg-info">
                                <i class="fas fa-hdd"></i>
                            </div>
                            <div class="metric-info">
                                <h6>Storage</h6>
                                <p class="text-info">{{ $system_health['storage_usage']['used'] }} / {{ $system_health['storage_usage']['total'] }}</p>
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-info" style="width: {{ $system_health['storage_usage']['percentage'] }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="health-metric">
                            <div class="metric-icon bg-warning">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="metric-info">
                                <h6>Uptime</h6>
                                <p class="text-warning">{{ $system_health['uptime'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="health-metric">
                            <div class="metric-icon bg-secondary">
                                <i class="fas fa-save"></i>
                            </div>
                            <div class="metric-info">
                                <h6>Last Backup</h6>
                                <p class="text-muted">{{ $system_health['last_backup'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- College Information -->
    <div class="col-lg-4 mb-4">
        <div class="info-card">
            <div class="info-header">
                <h5 class="info-title">College Information</h5>
            </div>
            <div class="info-body">
                <div class="info-item">
                    <i class="fas fa-university text-primary"></i>
                    <div>
                        <strong>Shantineketan College</strong>
                        <p class="text-muted mb-0">Excellence in Education</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt text-danger"></i>
                    <div>
                        <strong>Raipur, Chhattisgarh</strong>
                        <p class="text-muted mb-0">Ring Road No.1, Changorbhatha</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-calendar text-success"></i>
                    <div>
                        <strong>Established 2009</strong>
                        <p class="text-muted mb-0">{{ date('Y') - 2009 }}+ years of excellence</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-code text-info"></i>
                    <div>
                        <strong>Admin Panel v2.0</strong>
                        <p class="text-muted mb-0">Last updated: {{ date('M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- System Information -->
<div class="row">
    <div class="col-12">
        <div class="stats-card">
            <h5 class="mb-3">System Information</h5>
            <div class="row">
                <div class="col-md-3">
                    <strong>College Name:</strong><br>
                    <span class="text-muted">Shantineketan College</span>
                </div>
                <div class="col-md-3">
                    <strong>Location:</strong><br>
                    <span class="text-muted">Raipur, Chhattisgarh</span>
                </div>
                <div class="col-md-3">
                    <strong>Established:</strong><br>
                    <span class="text-muted">2009</span>
                </div>
                <div class="col-md-3">
                    <strong>Admin Panel Version:</strong><br>
                    <span class="text-muted">v1.0.0</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Welcome Card */
.welcome-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px;
    padding: 30px;
    color: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.welcome-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.welcome-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 20px;
}

.today-stats {
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.95rem;
    opacity: 0.95;
}

.stat-item i {
    font-size: 1.1rem;
}

/* Enhanced Stats Cards */
.stats-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    border: none;
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
}

.stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.stats-card-gradient-orange {
    background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
}

.stats-card-gradient-green {
    background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
}

.stats-card-gradient-blue {
    background: linear-gradient(135deg, #d299c2 0%, #fef9d7 100%);
}

.stats-card-gradient-purple {
    background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
}

.stats-card-body {
    padding: 25px;
}

.stats-title {
    font-size: 0.85rem;
    font-weight: 600;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 10px;
}

.stats-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    line-height: 1;
    margin-bottom: 15px;
}

.stats-progress {
    margin-top: 10px;
}

.stats-progress .progress {
    height: 6px;
    border-radius: 3px;
    background-color: rgba(255,255,255,0.3);
    margin-bottom: 8px;
}

.stats-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: rgba(255,255,255,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #333;
    font-size: 24px;
}

.stats-card-footer {
    background: rgba(255,255,255,0.1);
    padding: 15px 25px;
}

.stats-link {
    color: #333;
    text-decoration: none;
    font-weight: 500;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
}

.stats-link:hover {
    color: #555;
    transform: translateX(5px);
}

/* Mini Stats Cards */
.mini-stats-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.mini-stats-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.mini-stats-content {
    display: flex;
    align-items: center;
    gap: 15px;
}

.mini-stats-icon {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
}

.mini-stats-info h4 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 5px;
    color: #333;
}

.mini-stats-info p {
    font-size: 0.9rem;
    color: #666;
    margin: 0;
}

/* Chart Cards */
.chart-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    overflow: hidden;
}

.chart-header {
    padding: 20px 25px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chart-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    margin: 0;
}

.chart-body {
    padding: 20px 25px;
}

.chart-legend {
    padding: 0 25px 20px;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.legend-color {
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

/* Quick Actions */
.quick-actions-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.quick-actions-header {
    margin-bottom: 25px;
}

.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.quick-action-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 12px;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.quick-action-item:hover {
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transform: translateY(-2px);
    color: inherit;
    border-color: #e9ecef;
}

.quick-action-icon {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
    flex-shrink: 0;
}

.quick-action-content h6 {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 5px;
    color: #333;
}

.quick-action-content p {
    font-size: 0.85rem;
    color: #666;
    margin: 0;
}

.bg-purple {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

/* Activity Cards */
.activity-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    overflow: hidden;
}

.activity-header {
    padding: 20px 25px;
    border-bottom: 1px solid #f0f0f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.activity-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    margin: 0;
}

.activity-body {
    padding: 20px 25px;
    max-height: 400px;
    overflow-y: auto;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #f8f9fa;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-avatar {
    flex-shrink: 0;
}

.avatar-circle {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 16px;
}

.avatar-image {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    object-fit: cover;
}

.activity-content {
    flex-grow: 1;
}

.activity-name {
    font-size: 0.95rem;
    font-weight: 600;
    margin-bottom: 5px;
    color: #333;
}

.activity-description {
    font-size: 0.85rem;
    color: #666;
    margin-bottom: 5px;
}

.activity-time {
    font-size: 0.8rem;
    color: #999;
}

.activity-status {
    flex-shrink: 0;
}

.empty-state {
    text-align: center;
    padding: 40px 20px;
}

/* System Cards */
.system-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    overflow: hidden;
}

.system-header {
    padding: 20px 25px;
    border-bottom: 1px solid #f0f0f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.system-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    margin: 0;
}

.system-status {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.status-healthy {
    background: #d4edda;
    color: #155724;
}

.system-body {
    padding: 25px;
}

.health-metric {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 10px;
    margin-bottom: 15px;
}

.metric-icon {
    width: 45px;
    height: 45px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 16px;
    flex-shrink: 0;
}

.metric-info h6 {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 5px;
    color: #333;
}

.metric-info p {
    font-size: 0.85rem;
    margin: 0;
}

/* Info Cards */
.info-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    overflow: hidden;
}

.info-header {
    padding: 20px 25px;
    border-bottom: 1px solid #f0f0f0;
}

.info-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    margin: 0;
}

.info-body {
    padding: 25px;
}

.info-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 20px;
}

.info-item:last-child {
    margin-bottom: 0;
}

.info-item i {
    font-size: 18px;
    margin-top: 2px;
    flex-shrink: 0;
}

.info-item strong {
    display: block;
    font-size: 0.95rem;
    margin-bottom: 3px;
    color: #333;
}

.info-item p {
    font-size: 0.85rem;
    margin: 0;
}

/* Gradients */
.bg-gradient-success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
}

.bg-gradient-info {
    background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%) !important;
}

.bg-gradient-warning {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%) !important;
}

.bg-gradient-danger {
    background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%) !important;
}

/* Responsive */
@media (max-width: 768px) {
    .welcome-title {
        font-size: 1.5rem;
    }

    .today-stats {
        gap: 15px;
    }

    .stats-number {
        font-size: 2rem;
    }

    .quick-actions-grid {
        grid-template-columns: 1fr;
    }

    .health-metric {
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Applications Trend Chart
    const applicationsCtx = document.getElementById('applicationsChart').getContext('2d');
    const applicationsChart = new Chart(applicationsCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_column($analytics['applications_trend'], 'date')) !!},
            datasets: [{
                label: 'Applications',
                data: {!! json_encode(array_column($analytics['applications_trend'], 'count')) !!},
                borderColor: '#667eea',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#667eea',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    },
                    ticks: {
                        color: '#666'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#666'
                    }
                }
            },
            elements: {
                point: {
                    hoverRadius: 8
                }
            }
        }
    });

    // Application Status Pie Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Under Review', 'Approved', 'Rejected'],
            datasets: [{
                data: [
                    {{ $analytics['applications_by_status']['pending'] }},
                    {{ $analytics['applications_by_status']['under_review'] }},
                    {{ $analytics['applications_by_status']['approved'] }},
                    {{ $analytics['applications_by_status']['rejected'] }}
                ],
                backgroundColor: [
                    '#ffc107',
                    '#17a2b8',
                    '#28a745',
                    '#dc3545'
                ],
                borderWidth: 0,
                cutout: '60%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Refresh chart function
    window.refreshChart = function(type) {
        if (type === 'applications') {
            // Add refresh logic here
            console.log('Refreshing applications chart...');
        }
    };

    // Auto-refresh every 5 minutes
    setInterval(function() {
        location.reload();
    }, 300000); // 5 minutes
});
</script>
@endpush
