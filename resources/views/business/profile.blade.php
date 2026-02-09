@extends('layouts.app')

@section('title', 'Business Profile - B2B Community')

@section('content')
<div class="row">
    <div class="col-md-4">
        <!-- Profile Card -->
        <div class="card dashboard-card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-id-card text-primary me-2"></i>Profile Overview
                </h5>
            </div>
            <div class="card-body text-center">
                <div class="mb-4">
                    <div class="bg-primary text-white rounded-circle d-inline-flex p-4 mb-3">
                        <i class="fas fa-building fa-3x"></i>
                    </div>
                    <h4>{{ $user->company_name ?? 'Company Name' }}</h4>
                    <p class="text-muted mb-2">{{ $user->business_type ?? 'Business Type' }}</p>
                    <span class="badge bg-info mb-3">{{ $user->industry ?? 'Industry' }}</span>
                    
                    <div class="d-flex justify-content-center mb-3">
                        <div class="text-center mx-3">
                            <h5 class="mb-0">24</h5>
                            <small class="text-muted">Connections</small>
                        </div>
                        <div class="text-center mx-3">
                            <h5 class="mb-0">12</h5>
                            <small class="text-muted">Resources</small>
                        </div>
                        <div class="text-center mx-3">
                            <h5 class="mb-0">8</h5>
                            <small class="text-muted">Requests</small>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="progress mb-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                    </div>
                    <small class="text-muted">Profile Completion: 85%</small>
                </div>
                
                <div class="text-start">
                    <h6 class="mb-3">
                        <i class="fas fa-info-circle me-2"></i>Quick Info
                    </h6>
                    <div class="mb-2">
                        <small class="text-muted d-block mb-1">
                            <i class="fas fa-user me-1"></i> Contact Person
                        </small>
                        <strong>{{ $user->name ?? 'Not specified' }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted d-block mb-1">
                            <i class="fas fa-envelope me-1"></i> Email
                        </small>
                        <strong>{{ $user->email ?? 'Not specified' }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted d-block mb-1">
                            <i class="fas fa-phone me-1"></i> Phone
                        </small>
                        <strong>{{ $user->phone ?? 'Not specified' }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted d-block mb-1">
                            <i class="fas fa-users me-1"></i> Employees
                        </small>
                        <strong>{{ $user->employee_count ?? 'Not specified' }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted d-block mb-1">
                            <i class="fas fa-map-marker-alt me-1"></i> Location
                        </small>
                        <strong>{{ $user->city ?? 'City' }}, {{ $user->country ?? 'Country' }}</strong>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted d-block mb-1">
                            <i class="fas fa-calendar me-1"></i> Member Since
                        </small>
                        <strong>{{ $user->created_at->format('F d, Y') ?? 'Recently' }}</strong>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button class="btn btn-outline-primary w-100 mb-2">
                        <i class="fas fa-download me-1"></i> Export Profile
                    </button>
                    <button class="btn btn-outline-success w-100 mb-2">
                        <i class="fas fa-share-alt me-1"></i> Share Profile
                    </button>
                    <button class="btn btn-outline-info w-100" data-bs-toggle="modal" data-bs-target="#qrModal">
                        <i class="fas fa-qrcode me-1"></i> Get QR Code
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Verification Status -->
        <div class="card dashboard-card">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-shield-alt text-success me-2"></i>Verification Status
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-success text-white rounded-circle p-2 me-3">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Email Verified</h6>
                            <small class="text-muted">Verified on {{ $user->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-success text-white rounded-circle p-2 me-3">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Phone Verified</h6>
                            <small class="text-muted">Verified on {{ $user->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-warning text-white rounded-circle p-2 me-3">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Business Verification</h6>
                            <small class="text-muted">Pending review</small>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center">
                        <div class="bg-light text-muted rounded-circle p-2 me-3">
                            <i class="fas fa-file"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Tax ID Verification</h6>
                            <small class="text-muted">Not submitted</small>
                        </div>
                    </div>
                </div>
                
                <div class="alert alert-info">
                    <small>
                        <i class="fas fa-info-circle me-1"></i>
                        Complete all verifications to unlock premium features and increase trust score.
                    </small>
                </div>
                
                <button class="btn btn-warning w-100">
                    <i class="fas fa-upload me-1"></i> Upload Documents
                </button>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <!-- Edit Profile Form -->
        <div class="card dashboard-card mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-edit text-primary me-2"></i>Edit Business Profile
                </h5>
                <span class="badge bg-primary">Last updated: {{ $user->updated_at->format('M d, Y') }}</span>
            </div>
            <div class="card-body">
                <form action="/b2b-profile-update" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Account Information -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">
                            <i class="fas fa-user-circle me-2"></i>Account Information
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Person Name *</label>
                                <input type="text" class="form-control" name="name" 
                                       value="{{ $user->name ?? '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address *</label>
                                <input type="email" class="form-control" name="email" 
                                       value="{{ $user->email ?? '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" name="phone" 
                                       value="{{ $user->phone ?? '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" 
                                       placeholder="Leave blank to keep current">
                                <small class="text-muted">Enter new password if you want to change it</small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Business Information -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">
                            <i class="fas fa-briefcase me-2"></i>Business Information
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Name *</label>
                                <input type="text" class="form-control" name="company_name" 
                                       value="{{ $user->company_name ?? '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Business Type *</label>
                                <select class="form-select" name="business_type" required>
                                    <option value="">Select Type</option>
                                    <option value="Manufacturer" {{ $user->business_type == 'Manufacturer' ? 'selected' : '' }}>Manufacturer</option>
                                    <option value="Distributor" {{ $user->business_type == 'Distributor' ? 'selected' : '' }}>Distributor</option>
                                    <option value="Wholesaler" {{ $user->business_type == 'Wholesaler' ? 'selected' : '' }}>Wholesaler</option>
                                    <option value="Retailer" {{ $user->business_type == 'Retailer' ? 'selected' : '' }}>Retailer</option>
                                    <option value="Service Provider" {{ $user->business_type == 'Service Provider' ? 'selected' : '' }}>Service Provider</option>
                                    <option value="Startup" {{ $user->business_type == 'Startup' ? 'selected' : '' }}>Startup</option>
                                    <option value="SME" {{ $user->business_type == 'SME' ? 'selected' : '' }}>SME</option>
                                    <option value="Enterprise" {{ $user->business_type == 'Enterprise' ? 'selected' : '' }}>Enterprise</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Industry *</label>
                                <select class="form-select" name="industry" required>
                                    <option value="">Select Industry</option>
                                    <option value="Technology" {{ $user->industry == 'Technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="Manufacturing" {{ $user->industry == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                    <option value="Healthcare" {{ $user->industry == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="Finance" {{ $user->industry == 'Finance' ? 'selected' : '' }}>Finance</option>
                                    <option value="Retail" {{ $user->industry == 'Retail' ? 'selected' : '' }}>Retail</option>
                                    <option value="Education" {{ $user->industry == 'Education' ? 'selected' : '' }}>Education</option>
                                    <option value="Food & Beverage" {{ $user->industry == 'Food & Beverage' ? 'selected' : '' }}>Food & Beverage</option>
                                    <option value="Construction" {{ $user->industry == 'Construction' ? 'selected' : '' }}>Construction</option>
                                    <option value="Transportation" {{ $user->industry == 'Transportation' ? 'selected' : '' }}>Transportation</option>
                                    <option value="Agriculture" {{ $user->industry == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Employee Count</label>
                                <select class="form-select" name="employee_count">
                                    <option value="">Select Range</option>
                                    <option value="1-10" {{ $user->employee_count == '1-10' ? 'selected' : '' }}>1-10 Employees</option>
                                    <option value="11-50" {{ $user->employee_count == '11-50' ? 'selected' : '' }}>11-50 Employees</option>
                                    <option value="51-200" {{ $user->employee_count == '51-200' ? 'selected' : '' }}>51-200 Employees</option>
                                    <option value="201-500" {{ $user->employee_count == '201-500' ? 'selected' : '' }}>201-500 Employees</option>
                                    <option value="501-1000" {{ $user->employee_count == '501-1000' ? 'selected' : '' }}>501-1000 Employees</option>
                                    <option value="1000+" {{ $user->employee_count == '1000+' ? 'selected' : '' }}>1000+ Employees</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Annual Revenue (USD)</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" name="annual_revenue" 
                                           value="{{ $user->annual_revenue ?? '' }}" 
                                           placeholder="e.g., 1000000">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Website</label>
                                <div class="input-group">
                                    <span class="input-group-text">https://</span>
                                    <input type="url" class="form-control" name="website" 
                                           value="{{ $user->website ?? '' }}" 
                                           placeholder="yourcompany.com">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Business Description</label>
                                <textarea class="form-control" name="description" rows="4" 
                                          placeholder="Describe your business, services, and values...">{{ $user->description ?? '' }}</textarea>
                                <small class="text-muted">Max 500 characters</small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Address Information -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>Address Information
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Street Address</label>
                                <input type="text" class="form-control" name="address" 
                                       value="{{ $user->address ?? '' }}" 
                                       placeholder="123 Business St">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" 
                                       value="{{ $user->city ?? '' }}" placeholder="New York">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">State/Province</label>
                                <input type="text" class="form-control" name="state" 
                                       value="{{ $user->state ?? '' }}" placeholder="NY">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" name="country" 
                                       value="{{ $user->country ?? '' }}" placeholder="USA">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">ZIP/Postal Code</label>
                                <input type="text" class="form-control" name="zip_code" 
                                       value="{{ $user->zip_code ?? '' }}" placeholder="10001">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Business Hours -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">
                            <i class="fas fa-clock me-2"></i>Business Hours
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Opening Time</label>
                                <input type="time" class="form-control" name="opening_time" 
                                       value="{{ $user->opening_time ?? '09:00' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Closing Time</label>
                                <input type="time" class="form-control" name="closing_time" 
                                       value="{{ $user->closing_time ?? '17:00' }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Working Days</label>
                                <div class="d-flex flex-wrap gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="working_days[]" 
                                               value="Monday" id="monday" checked>
                                        <label class="form-check-label" for="monday">Mon</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="working_days[]" 
                                               value="Tuesday" id="tuesday" checked>
                                        <label class="form-check-label" for="tuesday">Tue</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="working_days[]" 
                                               value="Wednesday" id="wednesday" checked>
                                        <label class="form-check-label" for="wednesday">Wed</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="working_days[]" 
                                               value="Thursday" id="thursday" checked>
                                        <label class="form-check-label" for="thursday">Thu</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="working_days[]" 
                                               value="Friday" id="friday" checked>
                                        <label class="form-check-label" for="friday">Fri</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="working_days[]" 
                                               value="Saturday" id="saturday">
                                        <label class="form-check-label" for="saturday">Sat</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="working_days[]" 
                                               value="Sunday" id="sunday">
                                        <label class="form-check-label" for="sunday">Sun</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Services & Needs -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">
                            <i class="fas fa-exchange-alt me-2"></i>Services & Needs
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Services Offered</label>
                                <textarea class="form-control" name="services_offered" rows="3" 
                                          placeholder="List services your business offers...">{{ $user->services_offered ?? '' }}</textarea>
                                <small class="text-muted">Separate with commas</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Services Needed</label>
                                <textarea class="form-control" name="services_needed" rows="3" 
                                          placeholder="List services your business needs...">{{ $user->services_needed ?? '' }}</textarea>
                                <small class="text-muted">Separate with commas</small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Submit Buttons -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Save Changes
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-undo me-1"></i> Reset
                        </button>
                        <a href="/dashboard" class="btn btn-outline-danger ms-auto">
                            <i class="fas fa-times me-1"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Additional Information -->
        <div class="card dashboard-card">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-chart-bar text-info me-2"></i>Profile Analytics
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-3">
                        <div class="bg-light rounded-circle p-3 mb-2 mx-auto d-inline-block">
                            <i class="fas fa-eye fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-0">156</h4>
                        <small class="text-muted">Profile Views</small>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <div class="bg-light rounded-circle p-3 mb-2 mx-auto d-inline-block">
                            <i class="fas fa-search fa-2x text-success"></i>
                        </div>
                        <h4 class="mb-0">89</h4>
                        <small class="text-muted">Search Appearances</small>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <div class="bg-light rounded-circle p-3 mb-2 mx-auto d-inline-block">
                            <i class="fas fa-handshake fa-2x text-warning"></i>
                        </div>
                        <h4 class="mb-0">24</h4>
                        <small class="text-muted">Connection Requests</small>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6 class="mb-3">
                        <i class="fas fa-bullseye me-2"></i>Profile Optimization Tips
                    </h6>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-success text-white rounded-circle p-2">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Complete Business Description</h6>
                                    <small class="text-muted">Add more details about your business</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-warning text-white rounded-circle p-2">
                                        <i class="fas fa-exclamation"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Add Business Logo</h6>
                                    <small class="text-muted">Upload your company logo for better recognition</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-info text-white rounded-circle p-2">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">List Your Services</h6>
                                    <small class="text-muted">Add specific services you offer or need</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- QR Code Modal -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-qrcode me-2"></i>Business QR Code
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div class="mb-3">
                    <!-- QR Code Placeholder -->
                    <div class="bg-light p-4 d-inline-block mb-3">
                        <div class="border border-dark" style="width: 150px; height: 150px; 
                             display: grid; grid-template-columns: repeat(10, 1fr); grid-template-rows: repeat(10, 1fr);">
                            @for($i = 0; $i < 100; $i++)
                                <div class="{{ rand(0, 1) ? 'bg-dark' : '' }}"></div>
                            @endfor
                        </div>
                    </div>
                    <h6>Scan to view business profile</h6>
                    <small class="text-muted">Share this QR code for quick access</small>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary">
                        <i class="fas fa-download me-1"></i> Download QR Code
                    </button>
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection