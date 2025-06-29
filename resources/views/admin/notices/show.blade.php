@extends('admin.layouts.app')

@section('title', 'View Notice')
@section('page-title', 'Notice Details')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Notice Preview</h5>
                <div>
                    @if($notice->priority === 'high')
                        <span class="badge bg-danger">High Priority</span>
                    @elseif($notice->priority === 'normal')
                        <span class="badge bg-warning">Normal Priority</span>
                    @else
                        <span class="badge bg-secondary">Low Priority</span>
                    @endif
                    
                    @if($notice->is_active)
                        <span class="badge bg-success ms-2">Active</span>
                    @else
                        <span class="badge bg-secondary ms-2">Inactive</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="notice-preview">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <span class="badge bg-{{ $notice->category === 'examination' ? 'danger' : ($notice->category === 'admission' ? 'success' : ($notice->category === 'events' ? 'info' : 'secondary')) }} me-2">
                                {{ ucfirst($notice->category) }}
                            </span>
                            @if($notice->priority === 'high')
                                <span class="badge bg-danger">High Priority</span>
                            @endif
                        </div>
                        <small class="text-muted">{{ $notice->publish_date->format('M d, Y') }}</small>
                    </div>
                    
                    <h3 class="notice-title mb-3">{{ $notice->title }}</h3>
                    
                    <div class="notice-content">
                        {!! nl2br(e($notice->content)) !!}
                    </div>
                    
                    @if($notice->attachment)
                        <div class="notice-attachment mt-4 p-3 bg-light rounded">
                            <h6><i class="fas fa-paperclip me-2"></i>Attachment</h6>
                            <a href="{{ Storage::url($notice->attachment) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-2"></i>Download {{ basename($notice->attachment) }}
                            </a>
                        </div>
                    @endif
                    
                    <div class="notice-footer mt-4 pt-3 border-top">
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <strong>Published:</strong> {{ $notice->publish_date->format('M d, Y') }}
                                </small>
                            </div>
                            @if($notice->expire_date)
                                <div class="col-md-6 text-md-end">
                                    <small class="text-muted">
                                        <strong>Expires:</strong> {{ $notice->expire_date->format('M d, Y') }}
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Notice Information</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td>#{{ $notice->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Category:</strong></td>
                        <td>
                            <span class="badge bg-{{ $notice->category === 'examination' ? 'danger' : ($notice->category === 'admission' ? 'success' : ($notice->category === 'events' ? 'info' : 'secondary')) }}">
                                {{ ucfirst($notice->category) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Priority:</strong></td>
                        <td>
                            <span class="badge bg-{{ $notice->priority === 'high' ? 'danger' : ($notice->priority === 'normal' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($notice->priority) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td>
                            @if($notice->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Publish Date:</strong></td>
                        <td>{{ $notice->publish_date->format('M d, Y') }}</td>
                    </tr>
                    @if($notice->expire_date)
                        <tr>
                            <td><strong>Expire Date:</strong></td>
                            <td>{{ $notice->expire_date->format('M d, Y') }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td><strong>Created:</strong></td>
                        <td>{{ $notice->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated:</strong></td>
                        <td>{{ $notice->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created By:</strong></td>
                        <td>{{ $notice->admin->name }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.notices.edit', $notice) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Notice
                    </a>
                    
                    @if($notice->attachment)
                        <a href="{{ Storage::url($notice->attachment) }}" target="_blank" class="btn btn-outline-info">
                            <i class="fas fa-download me-2"></i>Download Attachment
                        </a>
                    @endif
                    
                    <a href="{{ route('admin.notices.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                    
                    <hr>
                    
                    <form action="{{ route('admin.notices.destroy', $notice) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this notice?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Notice
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        @if($notice->expire_date && $notice->expire_date->isPast())
            <div class="alert alert-warning mt-3">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Notice Expired</strong><br>
                This notice expired on {{ $notice->expire_date->format('M d, Y') }}.
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
.notice-preview {
    font-family: 'Inter', sans-serif;
}

.notice-title {
    color: #2C3E50;
    font-weight: 600;
    line-height: 1.3;
}

.notice-content {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
}

.notice-attachment {
    border-left: 4px solid #FFD700;
}
</style>
@endpush
