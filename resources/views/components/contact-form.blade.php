<div class="contact-form-component"
    style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border-radius: 16px; padding: 24px; border: 1px solid rgba(0, 0, 0, 0.1);">
    @if(session('success'))
        <div class="alert alert-success"
            style="padding: 12px; background: #d1fae5; color: #065f46; border-radius: 8px; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error"
            style="padding: 12px; background: #fee2e2; color: #991b1b; border-radius: 8px; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error"
            style="padding: 12px; background: #fee2e2; color: #991b1b; border-radius: 8px; margin-bottom: 16px;">
            <ul style="list-style: none; margin: 0; padding: 0;">
                @foreach($errors->all() as $error)
                    <li><i class="fas fa-dot-circle" style="font-size: 8px; vertical-align: middle; margin-right: 4px;"></i>
                        {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 16px;">
            <label for="name"
                style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: #475569;">Your
                Name</label>
            <input type="text" id="name" name="name" class="form-control"
                value="{{ auth()->user()->name ?? old('name') }}" placeholder="John Doe" required
                style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; background: white;">
        </div>
        <div class="form-group" style="margin-bottom: 16px;">
            <label for="email"
                style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: #475569;">Email
                Address</label>
            <input type="email" id="email" name="email" class="form-control"
                value="{{ auth()->user()->email ?? old('email') }}" placeholder="john@example.com" required
                style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; background: white;">
        </div>
        <div class="form-group" style="margin-bottom: 16px;">
            <label for="subject"
                style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: #475569;">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control" placeholder="Inquiry about..." required
                style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; background: white;">
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="message"
                style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: #475569;">Your
                Message / Problem</label>
            <textarea id="message" name="message" class="form-control" placeholder="Tell us how we can help..." required
                style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; min-height: 120px; background: white; resize: vertical;"></textarea>
        </div>
        <button type="submit" class="btn btn-primary"
            style="width: 100%; padding: 12px; border-radius: 8px; font-weight: 700; background: #2563eb; color: white; border: none; cursor: pointer; transition: background 0.2s;">
            <span>Send Message</span>
            <i class="fas fa-paper-plane" style="margin-left: 8px;"></i>
        </button>
    </form>
</div>