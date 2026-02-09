@extends('layouts.app')

@section('title', 'Dashboard - B2B Community')

@section('content')
<!-- Welcome Card -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card welcome-card dashboard-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3 class="text-white mb-3">
                            <i class="fas fa-handshake me-2"></i>Welcome back, {{ $user->name ?? 'Business Owner' }}!
                        </h3>
                        <p class="text-white mb-0">
                            From <strong>{{ $user->company_name ?? 'Your Company' }}</strong> | 
                            {{ $user->industry ?? 'Industry' }} | 
                            Member since {{ $user->created_at->format('M Y') ?? 'Recently' }}
                        </p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="badge bg-light text-dark p-3">
                            <i class="fas fa-check-circle text-success me-1"></i>
                            Account Status: <strong>Active</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="stat-card dashboard-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-1">NETWORK</h6>
                    <h2 class="mb-0">24</h2>
                    <small>Business Connections</small>
                </div>
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card dashboard-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-1">RESOURCES</h6>
                    <h2 class="mb-0">12</h2>
                    <small>Active Listings</small>
                </div>
                <i class="fas fa-exchange-alt"></i>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card dashboard-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-1">REQUESTS</h6>
                    <h2 class="mb-0">8</h2>
                    <small>Pending Requests</small>
                </div>
                <i class="fas fa-bell"></i>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card dashboard-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-1">PROFILE</h6>
                    <h2 class="mb-0">85%</h2>
                    <small>Completion Rate</small>
                </div>
                <i class="fas fa-chart-line"></i>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="row">
    <!-- Left Column -->
    <div class="col-md-8">
        <!-- Quick Actions -->
        <div class="card dashboard-card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-bolt text-warning me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="/dashboard/profile" class="btn btn-outline-primary w-100 h-100 py-3">
                            <i class="fas fa-edit fa-2x mb-2"></i><br>
                            Edit Profile
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="#" class="btn btn-outline-success w-100 h-100 py-3">
                            <i class="fas fa-search fa-2x mb-2"></i><br>
                            Find Businesses
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="#" class="btn btn-outline-info w-100 h-100 py-3">
                            <i class="fas fa-plus-circle fa-2x mb-2"></i><br>
                            Post Resource
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="#" class="btn btn-outline-warning w-100 h-100 py-3">
                            <i class="fas fa-envelope fa-2x mb-2"></i><br>
                            Messages (5)
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activities -->
        <div class="card dashboard-card">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-history text-info me-2"></i>Recent Activities
                </h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle p-2">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">New Connection</h6>
                                <p class="mb-0 text-muted">Connected with Tech Solutions Inc.</p>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-success text-white rounded-circle p-2">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Resource Shared</h6>
                                <p class="mb-0 text-muted">Shared warehouse space with ABC Corp</p>
                                <small class="text-muted">Yesterday</small>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-warning text-white rounded-circle p-2">
                                    <i class="fas fa-bell"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">New Request</h6>
                                <p class="mb-0 text-muted">Request for logistics partnership</p>
                                <small class="text-muted">2 days ago</small>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-info text-white rounded-circle p-2">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Profile Viewed</h6>
                                <p class="mb-0 text-muted">Your profile was viewed 15 times</p>
                                <small class="text-muted">3 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Right Column -->
    <div class="col-md-4">
        <!-- Business Profile Summary -->
        <div class="card dashboard-card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-building text-primary me-2"></i>Business Profile
                </h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex p-4 mb-3">
                        <i class="fas fa-building fa-2x"></i>
                    </div>
                    <h5>{{ $user->company_name ?? 'Company Name' }}</h5>
                    <p class="text-muted mb-2">{{ $user->business_type ?? 'Business Type' }}</p>
                    <span class="badge bg-info">{{ $user->industry ?? 'Industry' }}</span>
                </div>
                
                <div class="mb-3">
                    <div class="progress mb-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                    </div>
                    <small class="text-muted">Profile Completion: 85%</small>
                </div>
                
                <div class="mb-3">
                    <small class="text-muted d-block mb-1">
                        <i class="fas fa-users me-1"></i> Employees: 
                        <strong>{{ $user->employee_count ?? 'Not specified' }}</strong>
                    </small>
                    <small class="text-muted d-block mb-1">
                        <i class="fas fa-map-marker-alt me-1"></i> Location: 
                        <strong>{{ $user->city ?? 'City' }}, {{ $user->country ?? 'Country' }}</strong>
                    </small>
                    <small class="text-muted d-block mb-1">
                        <i class="fas fa-calendar me-1"></i> Member since: 
                        <strong>{{ $user->created_at->format('M Y') ?? 'Recently' }}</strong>
                    </small>
                </div>
                
                <a href="/dashboard/profile" class="btn btn-outline-primary w-100">
                    <i class="fas fa-edit me-1"></i> Edit Profile
                </a>
            </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="card dashboard-card">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-chart-pie text-success me-2"></i>Community Stats
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <small>Total Businesses</small>
                        <small>1,245</small>
                    </div>
                    <div class="progress mb-3" style="height: 5px;">
                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <small>Active Today</small>
                        <small>342</small>
                    </div>
                    <div class="progress mb-3" style="height: 5px;">
                        <div class="progress-bar bg-success" style="width: 75%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <small>New This Month</small>
                        <small>89</small>
                    </div>
                    <div class="progress mb-3" style="height: 5px;">
                        <div class="progress-bar bg-warning" style="width: 60%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <small>Resource Shares</small>
                        <small>567</small>
                    </div>
                    <div class="progress mb-3" style="height: 5px;">
                        <div class="progress-bar bg-info" style="width: 45%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Connections -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card dashboard-card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-user-friends text-primary me-2"></i>Recent Connections
                </h5>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card border-0 text-center">
                            <div class="card-body">
                                <div class="bg-light rounded-circle p-3 mb-3 mx-auto" style="width: 80px; height: 80px;">
                                    <i class="fas fa-building fa-2x text-primary"></i>
                                </div>
                                <h6>Tech Solutions Inc.</h6>
                                <small class="text-muted d-block">Technology</small>
                                <span class="badge bg-success">Verified</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card border-0 text-center">
                            <div class="card-body">
                                <div class="bg-light rounded-circle p-3 mb-3 mx-auto" style="width: 80px; height: 80px;">
                                    <i class="fas fa-warehouse fa-2x text-success"></i>
                                </div>
                                <h6>Global Logistics Co.</h6>
                                <small class="text-muted d-block">Transportation</small>
                                <span class="badge bg-success">Verified</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card border-0 text-center">
                            <div class="card-body">
                                <div class="bg-light rounded-circle p-3 mb-3 mx-auto" style="width: 80px; height: 80px;">
                                    <i class="fas fa-shopping-cart fa-2x text-info"></i>
                                </div>
                                <h6>Retail Partners LLC</h6>
                                <small class="text-muted d-block">Retail</small>
                                <span class="badge bg-warning">Pending</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card border-0 text-center">
                            <div class="card-body">
                                <div class="bg-light rounded-circle p-3 mb-3 mx-auto" style="width: 80px; height: 80px;">
                                    <i class="fas fa-industry fa-2x text-warning"></i>
                                </div>
                                <h6>Manufacturing Corp</h6>
                                <small class="text-muted d-block">Manufacturing</small>
                                <span class="badge bg-success">Verified</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection