param(
    [string]$FfmpegPath = "ffmpeg"
)

$ErrorActionPreference = "Stop"

function Test-Ffmpeg {
    param([string]$Binary)

    try {
        & $Binary -version | Out-Null
        return $true
    }
    catch {
        return $false
    }
}

if (-not (Test-Ffmpeg -Binary $FfmpegPath)) {
    throw "ffmpeg tidak ditemukan. Jalankan script ini dengan -FfmpegPath atau tambahkan ffmpeg ke PATH."
}

$jobs = @(
    @{
        Input  = "public/videos/citra-negara.mp4"
        Output = "public/videos/citra-negara-web.mp4"
        Scale  = "960:-2"
        Crf    = "29"
    },
    @{
        Input  = "public/videos/sma.mp4"
        Output = "public/videos/sma-web.mp4"
        Scale  = "960:-2"
        Crf    = "29"
    },
    @{
        Input  = "public/videos/smk.mp4"
        Output = "public/videos/smk-web.mp4"
        Scale  = "960:-2"
        Crf    = "28"
    },
    @{
        Input  = "public/videos/smp.mp4"
        Output = "public/videos/smp-web.mp4"
        Scale  = "960:-2"
        Crf    = "28"
    }
)

foreach ($job in $jobs) {
    if (-not (Test-Path -LiteralPath $job.Input)) {
        Write-Warning "File tidak ditemukan: $($job.Input)"
        continue
    }

    Write-Host "Optimizing $($job.Input) -> $($job.Output)"

    & $FfmpegPath `
        -y `
        -i $job.Input `
        -vf "scale=$($job.Scale),fps=24" `
        -an `
        -c:v libx264 `
        -profile:v main `
        -preset slow `
        -crf $job.Crf `
        -pix_fmt yuv420p `
        -movflags +faststart `
        $job.Output
}

Write-Host ""
Write-Host "Done. Hasil video web-optimized:"
Get-ChildItem -Path "public/videos/*-web.mp4" -ErrorAction SilentlyContinue |
    Select-Object Name, @{ Name = "SizeMB"; Expression = { [math]::Round($_.Length / 1MB, 2) } }, LastWriteTime
