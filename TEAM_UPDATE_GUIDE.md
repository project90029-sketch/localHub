# Team Section Update Guide

This guide will help you easily update the team member information in the Local Hub website.

## File Location

The team section is located in: `resources/views/about.blade.php`

## How to Update Team Member Information

Each team member card follows this structure:

```html
<div class="team-card">
    <div class="team-avatar">INITIALS</div>
    <h3 class="team-name">Full Name</h3>
    <p class="team-role">Job Title</p>
    <p class="team-bio">Short bio or description (2-3 sentences)</p>
    <div class="team-social">
        <a
            href="LINKEDIN_URL"
            target="_blank"
            rel="noopener noreferrer"
            class="social-link linkedin"
            aria-label="LinkedIn Profile"
        >
            <!-- LinkedIn SVG Icon -->
        </a>
        <a
            href="GITHUB_URL"
            target="_blank"
            rel="noopener noreferrer"
            class="social-link github"
            aria-label="GitHub Profile"
        >
            <!-- GitHub SVG Icon -->
        </a>
    </div>
</div>
```

## What to Change

### 1. Avatar Initials

Replace `INITIALS` with the team member's initials (2-3 letters):

```html
<div class="team-avatar">SK</div>
<!-- Example: Subha Kumar -->
```

### 2. Full Name

Replace `Full Name` with the team member's actual name:

```html
<h3 class="team-name">Subha Kumar</h3>
```

### 3. Job Title/Role

Replace `Job Title` with their position:

```html
<p class="team-role">Founder & CEO</p>
```

### 4. Bio

Replace the bio text with a brief description (keep it to 2-3 sentences):

```html
<p class="team-bio">
    Passionate about building technology that brings communities together and
    empowers local businesses.
</p>
```

### 5. LinkedIn URL

Replace `LINKEDIN_URL` with the actual LinkedIn profile URL:

```html
<a href="https://linkedin.com/in/subhakumar" target="_blank" ...></a>
```

### 6. GitHub URL

Replace `GITHUB_URL` with the actual GitHub profile URL:

```html
<a href="https://github.com/subhakumar" target="_blank" ...></a>
```

## Current Team Members (Placeholders)

1. **Kaushik Pal** - Founder & CEO
    - LinkedIn: https://linkedin.com/in/yourprofile
    - GitHub: https://github.com/yourusername

2. **Anirban Das** - Head of Product
    - LinkedIn: https://linkedin.com/in/yourprofile
    - GitHub: https://github.com/yourusername

3. **Rup Das** - Community Manager
    - LinkedIn: https://linkedin.com/in/yourprofile
    - GitHub: https://github.com/yourusername

4. **Ayan Ghosh** - Lead Developer
    - LinkedIn: https://linkedin.com/in/yourprofile
    - GitHub: https://github.com/yourusername

5. **Subhadip Ghosh** - Marketing Director
    - LinkedIn: https://linkedin.com/in/yourprofile
    - GitHub: https://github.com/yourusername

## Adding or Removing Team Members

### To Add a New Team Member:

1. Copy an existing team member's entire `<div class="team-card">...</div>` block
2. Paste it before the closing `</div>` of the team-grid
3. Update all the information (initials, name, role, bio, social links)

### To Remove a Team Member:

1. Find the team member's `<div class="team-card">...</div>` block
2. Delete the entire block including the comment above it (e.g., `<!-- Team Member 1 -->`)

## Responsive Layout

The team grid automatically adjusts based on screen size:

- **Mobile (≤768px)**: 1 card per row
- **Tablet (769px-1024px)**: 2 cards per row
- **Desktop (1025px-1400px)**: 3 cards per row
- **Large Desktop (≥1401px)**: 5 cards per row

## Design Features

✨ **Interactive Elements:**

- Hover effects on cards (lift and glow)
- Rotating avatar on hover
- Social link hover effects with brand colors
- Smooth animations throughout

🎨 **Color Scheme:**

- Dark background with gradient orbs
- Purple/blue gradient for primary elements
- Cyan gradient for role text
- LinkedIn blue and GitHub dark on hover

## Tips

1. **Keep bios consistent**: Try to keep all bios roughly the same length for visual consistency
2. **Use professional photos**: When ready, you can replace the avatar initials with actual photos
3. **Test links**: Always verify that LinkedIn and GitHub URLs are correct
4. **Maintain order**: Consider ordering team members by hierarchy or alphabetically

## Need Help?

If you encounter any issues or need to make more complex changes to the team section, refer to the main `about.blade.php` file starting at line 833 (Team Section).
