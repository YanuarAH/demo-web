// Script untuk membuat placeholder gambar
document.addEventListener("DOMContentLoaded", () => {
  const placeholders = {
    "genshin-explore": { text: "EXPLORE\nMAP", color: "#4ade80" },
    "genshin-percent": { text: "PER 1%\nEXPLORE", color: "#06b6d4" },
    "genshin-quest": { text: "ALL\nQUEST", color: "#f59e0b" },
    "genshin-services": { text: "OTHER\nSERVICES", color: "#8b5cf6" },
    "hsr-story": { text: "HSR\nSTORY", color: "#ef4444" },
    "hsr-endgame": { text: "HSR\nENDGAME", color: "#f97316" },
    "zzz-story": { text: "ZZZ\nSTORY", color: "#10b981" },
    "zzz-endgame": { text: "ZZZ\nENDGAME", color: "#3b82f6" },
    "wuwa-story": { text: "WUWA\nSTORY", color: "#8b5cf6" },
    "wuwa-endgame": { text: "WUWA\nENDGAME", color: "#06b6d4" },
  }

  // Create placeholder for missing images
  function createPlaceholder(name, config) {
    const canvas = document.createElement("canvas")
    const ctx = canvas.getContext("2d")
    canvas.width = 400
    canvas.height = 300

    // Background gradient
    const gradient = ctx.createLinearGradient(0, 0, 400, 300)
    gradient.addColorStop(0, config.color)
    gradient.addColorStop(1, config.color + "80")

    ctx.fillStyle = gradient
    ctx.fillRect(0, 0, 400, 300)

    // Text
    ctx.fillStyle = "white"
    ctx.font = "bold 32px Inter, sans-serif"
    ctx.textAlign = "center"
    ctx.shadowColor = "rgba(0,0,0,0.5)"
    ctx.shadowBlur = 4

    const lines = config.text.split("\n")
    lines.forEach((line, index) => {
      ctx.fillText(line, 200, 130 + index * 40)
    })

    return canvas.toDataURL()
  }

  // Replace missing images with placeholders
  const images = document.querySelectorAll("img")
  images.forEach((img) => {
    img.addEventListener("error", function () {
      const src = this.src
      const filename = src.split("/").pop().split(".")[0]

      if (placeholders[filename]) {
        this.src = createPlaceholder(filename, placeholders[filename])
      } else {
        // Default placeholder
        this.src = createPlaceholder("default", { text: "IMAGE\nCOMING SOON", color: "#64748b" })
      }
    })
  })
})
