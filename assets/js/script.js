// Sidebar Management
function toggleSidebar() {
  const sidebar = document.querySelector(".sidebar")
  const isOpen = sidebar && sidebar.classList.contains("open")

  if (isOpen) {
    closeSidebar()
  } else {
    openSidebar()
  }
}

function openSidebar() {
  const sidebar = document.querySelector(".sidebar")
  const overlay = getOrCreateOverlay()

  if (sidebar && overlay) {
    sidebar.classList.add("open")
    overlay.classList.add("active")
    document.body.style.overflow = "hidden" // Prevent background scroll
  }
}

function closeSidebar() {
  const sidebar = document.querySelector(".sidebar")
  const overlay = document.querySelector(".sidebar-overlay")

  if (sidebar) {
    sidebar.classList.remove("open")
  }

  if (overlay) {
    overlay.classList.remove("active")
  }

  document.body.style.overflow = "" // Restore scroll
}

function getOrCreateOverlay() {
  let overlay = document.querySelector(".sidebar-overlay")

  if (!overlay) {
    overlay = document.createElement("div")
    overlay.className = "sidebar-overlay"
    overlay.addEventListener("click", closeSidebar)
    document.body.appendChild(overlay)
  }

  return overlay
}

// Handle sidebar link clicks - auto close on mobile
function handleSidebarLinkClick() {
  // Only auto-close on mobile
  if (window.innerWidth <= 768) {
    setTimeout(() => {
      closeSidebar()
    }, 100) // Small delay to allow navigation
  }
}

// Close sidebar when clicking outside
function closeSidebarOnOutsideClick(event) {
  const sidebar = document.querySelector(".sidebar")
  const mobileMenuBtn = document.querySelector(".mobile-menu-btn")
  const overlay = document.querySelector(".sidebar-overlay")

  if (sidebar && sidebar.classList.contains("open")) {
    // Close if clicking on overlay
    if (overlay && overlay.contains(event.target)) {
      closeSidebar()
      return
    }

    // Close if clicking outside sidebar and not on menu button
    if (!sidebar.contains(event.target) && mobileMenuBtn && !mobileMenuBtn.contains(event.target)) {
      closeSidebar()
    }
  }
}

// Handle window resize
function handleResize() {
  const sidebar = document.querySelector(".sidebar")
  const overlay = document.querySelector(".sidebar-overlay")

  // Close sidebar on desktop
  if (window.innerWidth > 768) {
    if (sidebar) {
      sidebar.classList.remove("open")
    }
    if (overlay) {
      overlay.classList.remove("active")
    }
    document.body.style.overflow = ""
  }
}

// Improved touch handling for mobile
function initTouchHandling() {
  let touchStartX = 0
  let touchStartY = 0
  let touchStartTime = 0

  document.addEventListener(
    "touchstart",
    (e) => {
      touchStartX = e.touches[0].clientX
      touchStartY = e.touches[0].clientY
      touchStartTime = Date.now()
    },
    { passive: true },
  )

  document.addEventListener(
    "touchend",
    (e) => {
      const touchEndX = e.changedTouches[0].clientX
      const touchEndY = e.changedTouches[0].clientY
      const touchEndTime = Date.now()
      const diffX = touchStartX - touchEndX
      const diffY = touchStartY - touchEndY
      const timeDiff = touchEndTime - touchStartTime

      // Only process swipe if it's quick enough and long enough
      if (timeDiff < 300 && Math.abs(diffX) > 50) {
        const sidebar = document.querySelector(".sidebar")

        // Swipe left to close sidebar (only if sidebar is open)
        if (sidebar && sidebar.classList.contains("open")) {
          if (Math.abs(diffX) > Math.abs(diffY) && diffX > 0) {
            closeSidebar()
          }
        }
      }
    },
    { passive: true },
  )
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  initTouchHandling()
  initCarousel() // Add this line

  // Add click outside listener for sidebar
  document.addEventListener("click", closeSidebarOnOutsideClick)

  // Add resize listener
  window.addEventListener("resize", handleResize)

  // Add escape key listener to close sidebar
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      closeSidebar()
    }
  })

  // Prevent zoom on double tap for iOS
  let lastTouchEnd = 0
  document.addEventListener(
    "touchend",
    (event) => {
      const now = new Date().getTime()
      if (now - lastTouchEnd <= 300) {
        event.preventDefault()
      }
      lastTouchEnd = now
    },
    false,
  )

  // Auto-close sidebar when page loads on mobile
  if (window.innerWidth <= 768) {
    closeSidebar()
  }
})

// Utility function for WhatsApp message
function sendWhatsAppMessage(gameTitle, categoryTitle) {
  const message = `Halo, saya ingin joki ${gameTitle} untuk kategori ${categoryTitle}. Bisa info lebih lanjut?`
  const encodedMessage = encodeURIComponent(message)
  const whatsappUrl = `https://wa.me/6281234567890?text=${encodedMessage}`
  window.open(whatsappUrl, "_blank")
}

// Carousel Management
let currentSlide = 0
let slideInterval
const slides = document.querySelectorAll(".carousel-slide")
const indicators = document.querySelectorAll(".indicator")
const totalSlides = slides.length

function showSlide(index) {
  // Remove active class from all slides and indicators
  slides.forEach((slide) => {
    slide.classList.remove("active", "prev")
  })
  indicators.forEach((indicator) => {
    indicator.classList.remove("active")
  })

  // Add active class to current slide and indicator
  if (slides[index]) {
    slides[index].classList.add("active")
  }
  if (indicators[index]) {
    indicators[index].classList.add("active")
  }

  currentSlide = index
}

function nextSlide() {
  const next = (currentSlide + 1) % totalSlides
  showSlide(next)
}

function prevSlide() {
  const prev = (currentSlide - 1 + totalSlides) % totalSlides
  showSlide(prev)
}

function goToSlide(index) {
  showSlide(index)
  resetAutoSlide()
}

function startAutoSlide() {
  slideInterval = setInterval(nextSlide, 4000) // Change slide every 4 seconds
}

function stopAutoSlide() {
  if (slideInterval) {
    clearInterval(slideInterval)
  }
}

function resetAutoSlide() {
  stopAutoSlide()
  startAutoSlide()
}

// Initialize carousel
function initCarousel() {
  if (slides.length > 0) {
    showSlide(0)
    startAutoSlide()

    // Pause auto-slide on hover
    const carouselContainer = document.querySelector(".carousel-container")
    if (carouselContainer) {
      carouselContainer.addEventListener("mouseenter", stopAutoSlide)
      carouselContainer.addEventListener("mouseleave", startAutoSlide)
    }

    // Touch support for mobile
    let touchStartX = 0
    let touchEndX = 0

    carouselContainer.addEventListener(
      "touchstart",
      (e) => {
        touchStartX = e.changedTouches[0].screenX
      },
      { passive: true },
    )

    carouselContainer.addEventListener(
      "touchend",
      (e) => {
        touchEndX = e.changedTouches[0].screenX
        handleSwipe()
      },
      { passive: true },
    )

    function handleSwipe() {
      const swipeThreshold = 50
      const diff = touchStartX - touchEndX

      if (Math.abs(diff) > swipeThreshold) {
        if (diff > 0) {
          nextSlide() // Swipe left - next slide
        } else {
          prevSlide() // Swipe right - previous slide
        }
        resetAutoSlide()
      }
    }
  }
}
