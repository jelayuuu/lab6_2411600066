@csrf

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Course Name</label>
        <input type="text" name="name" value="{{ old('name', $course->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Course Code</label>
        <input type="text" name="code" value="{{ old('code', $course->code) }}" class="form-control @error('code') is-invalid @enderror" placeholder="e.g. ITE313">
        @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $course->description) }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Category</label>
        <select name="category" class="form-select @error('category') is-invalid @enderror">
            <option value="">-- Select Category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category }}" {{ old('category', $course->category) == $category ? 'selected' : '' }}>{{ $category }}</option>
            @endforeach
        </select>
        @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Instructor</label>
        <input type="text" name="instructor" value="{{ old('instructor', $course->instructor) }}" class="form-control @error('instructor') is-invalid @enderror" placeholder="e.g. Prof. Jamero">
        @error('instructor') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Units</label>
        <input type="number" name="units" min="1" max="12" value="{{ old('units', $course->units ?: 3) }}" class="form-control @error('units') is-invalid @enderror">
        @error('units') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Passing Grade</label>
        <input type="number" name="minimum_grade" min="0" max="4" step="0.25" value="{{ old('minimum_grade', $course->minimum_grade ?: '2.00') }}" class="form-control @error('minimum_grade') is-invalid @enderror">
        @error('minimum_grade') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Grade Point <span class="text-muted small">(0 = not graded)</span></label>
        <input type="number" name="grade_point" min="0" max="4" step="0.25" value="{{ old('grade_point', $course->grade_point ?: '0') }}" class="form-control @error('grade_point') is-invalid @enderror">
        @error('grade_point') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mt-4">
    <button type="submit" class="btn btn-primary">
        {{ $course->exists ? 'Update Course' : 'Save Course' }}
    </button>
    <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
